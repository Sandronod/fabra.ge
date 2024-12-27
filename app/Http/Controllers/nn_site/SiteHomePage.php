<?php

namespace App\Http\Controllers\nn_site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_slider;
use App\Models\nn_catalog;
use HttpRequest;
use App\Models\currencies;
use Cryptocap;

class SiteHomePage extends SiteController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  $defaults = ['USD', 'EUR', 'TRY'];
    public static $diagramfilters = ['USD', 'EUR', 'TRY', "RUB", "GBP"];

    public function index(Request $request)
    {


       dd('11');
    }

    public function bankCurrencies(Request $request)
    {
        // if (! (\Str::contains(substr(url()->current(), 0), ['ka']) || \Str::contains(substr(url()->current(), 0), ['en']))) {
        //     return redirect()->to(url('ka'));
        // }

        // $data['test'] = 1;
        $data['isBankCurrencies'] = 1;

        if($request->date != '')$data['currs'] = self::getNbgRates('ka',$request->date);
        else{
            $data['currs'] = self::getNbgRates();
        }

        $arr =  explode('-', $request->active);

        if($request->active!='' && sizeof($arr) > 0)$this->defaults = $arr;
        //dd($data['currs']);

        $data['defaults'] = $this->defaults;
        $banks = currencies::limit(8)->where('status_id', 1)->orderby('created_at', 'desc')->get()->toArray();
        $bankBid = array_column($banks, 'bid');
        array_multisort($bankBid, SORT_ASC, $banks);

        return view('nn_site.pages.bankcurrencies', $data);
    }

    public function getCryptoCurrencyData()
    {
        $url = 'https://rest.coinapi.io/v1/assets';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "X-CoinAPI-Key: E2FD77B6-8FFC-404A-96DA-63DE48C7325C",
            "Content-Type: application/json",
         );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);

        $result = json_decode($response, true);

        $myArrayInit = $result;
        $offsetKey = 100;

        //Lets do the code....
        $n = array_keys($result); //<---- Grab all the keys of your actual array and put in another array
        $count = array_search($offsetKey, $n); //<--- Returns the position of the offset from this array using search
        $newArray = array_slice($myArrayInit, 0, $count + 1, true);//<--- Slice it with the 0 index as start and position+1 as the length parameter.

        file_put_contents(base_path('public/json_data/crypto_currency.json'), json_encode($newArray));
    }

    public function getSevenDays()
    {
        $sevenday = [];
        $sevenday[] = self::getNbgRates();

        // dd($sevenday);

        // for ($i = 1; $i < 7; $i++) {
        //    $dateof = date('Y-m-d', time() - 60 * 60 * 24 * $i);
        //    $sevenday[] = self::getNbgRates('ka', $dateof);
        // }

        $dateof = date('Y-m-d', time() - 60 * 60 * 24 * 6);
        $sevenday[] = self::getNbgRates('ka', $dateof);

        // dd ($sevenday);

        //dd($sevenday);
        return $sevenday;
    }

    public function getChartDays(Request $request)
    {
        $sevenday = [];
        $days = [];


        // dd($sevenday);
        $quantity = 1;
        for ($i = 0; $i < 15; $i++) {
            $time = time();
            $code = "usd";
            if($request->dateofch != "") $time = strtotime($request->dateofch);
            if($request->code != "") $code = $request->code;
           $dateof = date('Y-m-d', $time - 60 * 60 * 24 * $i);

           if (getCurrentLocale() == 'ka') {

                setlocale(LC_TIME, 'Georgian');
                $days[]  = \Carbon\Carbon::parse(date('M d, Y', $time - 60 * 60 * 24 * $i))->formatLocalized('%b %d');

            } else {

                $days[] = date('d, M', $time - 60 * 60 * 24 * $i);

            }

            $sevenday[] = self::getNbgRates('ka', $dateof, $code)[0]->rate;

            if($code == "rub") $quantity = self::getNbgRates('ka', $dateof, $code)[0]->quantity;
        }
       // dd($sevenday);
        return [array_reverse($sevenday), array_reverse($days), $quantity];
    }


    public static function getNbgRates($lang = 'ka', $date = '', $cur = '')
    {
        $currency =$dates = '';
        if($cur != ''){
            $currency = 'currencies='.$cur;
        }
        if($date != ''){
            $dates = ($currency != '')?'&date='.$date:'date='.$date;
        }
        $params = '/?'.$currency.$dates;

        $rates = file_get_contents('https://nbg.gov.ge/gw/api/ct/monetarypolicy/currencies/'.$lang.'/json?'.$currency.$dates);
        $rates = json_decode($rates);
        $ratearray = $rates[0]->currencies;
        if($cur == ""){
            $orderFirstCurrs = self::$diagramfilters;
            $orderFirstCurrItems = [];

            foreach ($orderFirstCurrs as $item) {

                $index = array_search($item, array_column($ratearray, 'code'));

                $orderFirstCurrItems[] = $ratearray[$index];

                unset($ratearray[$index]);

                $ratearray = array_values($ratearray);

            }

            $rateOrderedArray = array_merge($orderFirstCurrItems, $ratearray);

            $ratearray = $rateOrderedArray;

        }


        return $ratearray;
    }

    function getCurrenciesData(Request $request)
    {

        $date = $request->exchangedate;
        if($request->date != '' && $request->act == 'ready')$date = $request->date;

        if($date == '')
        $data['currs']=self::getNbgRates();
        else $data['currs']=self::getNbgRates('ka',$date);
        $data['defaults'] = $this->defaults;

        $arr =  explode('-',$request->active);

        if($request->active!='' && sizeof($arr) > 0)$data['defaults'] = $arr;
        $curHtml = view('nn_site.partials.headerconverter', $data);

        return $curHtml;
    }

}
