<?php

namespace App\Http\Controllers\nn_site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_slider;
use App\Models\nn_catalog;
use App\Models\currencies;
use HttpRequest;
use voku\helper\HtmlDomParser;
use Cryptocap;

class CurrenciesApi extends SiteController 
{
    public $curs = ["USD","EUR","GBP","RUB"];

    public function get()
    {
        $this->tera();

        $this->getBog();

        $this->tbc();
        ;
        $this->kartu();

        $this->liberty();
        $this->credo();
        $this->khalik();
        $this->procredit();

        $this->cristal();  
        $this->valuto();
        $this->intelexpress();
        $this->rico();

        $this->fincredit();
        $this->girocredit();
    }


    public function getBog()
    {
        $body = file_get_contents('https://bankofgeorgia.ge/api/currencies/getCurrenciesList');
        $b = json_decode($body)->data;

        $body = '{"USD":{"buy":"'.$b[0]->buyRate.'","sell":"'.$b[0]->sellRate.'"},"EUR":{"buy":"'.$b[1]->buyRate.'","sell":"'.$b[1]->sellRate.'"},"GBP":{"buy":"'.$b[2]->buyRate.'","sell":"'.$b[2]->sellRate.'"},"RUB":{"buy":"'.$b[3]->buyRate.'","sell":"'.$b[3]->sellRate.'"}}';
        // dd($body);
        self::saveDb('საქართველოს ბანკი','Bank of Georgia',$body,1);

    }
   
    public static function tbc(){
        $templateHtml = file_get_contents('https://www.tbcbank.ge/web/ka/web/guest/exchange-rates?p_p_id=exchangeratessmall_WAR_tbcpwexchangeratessmallportlet&p_p_lifecycle=0&p_p_state=normal&p_p_mode=view&p_p_col_id=column-5&p_p_col_count=1');

        // add: "<br>" to "<li>"
        $htmlTmp = HtmlDomParser::str_get_html($templateHtml);
        $b = $htmlTmp->findMulti('.currRate');
        $body = '{"USD":{"buy":"'.$b[0]->innerHtml.'","sell":"'.$b[1]->innerHtml.'"},"EUR":{"buy":"'.$b[2]->innerHtml.'","sell":"'.$b[3]->innerHtml.'"},"GBP":{"buy":"'.$b[4]->innerHtml.'","sell":"'.$b[5]->innerHtml.'"}}';
        self::saveDb('თიბისი ბანკი','TBC Bank',$body,2);

    }

public static function tera()
{
   
    $html = file_get_contents('https://www.terabank.ge/ge/retail');

    $arr = explode('"Buy":', $html);
    $bottom1 = $arr[1];
    $middle = explode(',', $bottom1);
    $usd = $middle[0];

    $arr = explode('"Sell":', $html);
    $bottom1 = $arr[1];
    $middle = explode(',', $bottom1);
    $usd1 = $middle[0];

    $arr = explode('"Buy":', $html);
    $bottom1 = $arr[4];
    $middle = explode(',', $bottom1);
    $rub = $middle[0];

    $arr = explode('"Sell":', $html);
    $bottom1 = $arr[4];
    $middle = explode(',', $bottom1);
    $rub1 = $middle[0];

    $arr = explode('"Buy":', $html);
    $bottom1 = $arr[3];
    $middle = explode(',', $bottom1);
    $gbp = $middle[0];

    $arr = explode('"Sell":', $html);
    $bottom1 = $arr[3];
    $middle = explode(',', $bottom1);
    $gbp1 = $middle[0];

    $arr = explode('"Buy":', $html);
    $bottom1 = $arr[2];
    $middle = explode(',', $bottom1);
    $eur = $middle[0];

    $arr = explode('"Sell":', $html);
    $bottom1 = $arr[2];
    $middle = explode(',', $bottom1);
    $eur1 = $middle[0];


    $body = '{"USD":{"buy":"'.$usd.'","sell":"'.$usd1.'"},"EUR":{"buy":"'.$eur.'","sell":"'.$eur1.'"},"GBP":{"buy":"'.$gbp.'","sell":"'.$gbp1.'"},"RUB":{"buy":"'.$rub.'","sell":"'.$rub1.'"}}';

    self::saveDb('ტერაბანკი','TeraBank',$body,9);
    
}

public static function kartu(){
   
    $templateHtml = file_get_contents('https://www.cartubank.ge/');
 
    // add: "<br>" to "<li>"
    $htmlTmp = HtmlDomParser::str_get_html($templateHtml);
    $b = $htmlTmp->findOne('#usd');
 
    $body = '{"USD":{"buy":"'.$htmlTmp->findOne('#usd')->findOne('.buy')->innerHtml.'","sell":"'.$htmlTmp->findOne('#usd')->findOne('.sell')->innerHtml.'"},"EUR":{"buy":"'.$htmlTmp->findOne('#euro')->findOne('.buy')->innerHtml.'","sell":"'.$htmlTmp->findOne('#euro')->findOne('.sell')->innerHtml.'"},"GBP":{"buy":"'.$htmlTmp->findOne('#gb')->findOne('.buy')->innerHtml.'","sell":"'.$htmlTmp->findOne('#gb')->findOne('.sell')->innerHtml.'"},"RUB":{"buy":"'.$htmlTmp->findOne('#rub')->findOne('.buy')->innerHtml.'","sell":"'.$htmlTmp->findOne('#rub')->findOne('.sell')->innerHtml.'"}}'; 
    
    self::saveDb('ბანკი ქართუ','Cartu Bank',$body,4);
    
}

public function liberty(){
    $templateHtml = file_get_contents('https://libertybank.ge/ka/');

    // add: "<br>" to "<li>"
    $htmlTmp = HtmlDomParser::str_get_html($templateHtml);
    $b = $htmlTmp->findMulti('.currency-rates__item--showonmobile')->findMulti('.currency-rates__currency');
    $body = '{"USD":{"buy":"'.$b[0]->innerHtml.'","sell":"'.$b[1]->innerHtml.'"},"EUR":{"buy":"'.$b[6]->innerHtml.'","sell":"'.$b[7]->innerHtml.'"},"GBP":{"buy":"'.$b[12]->innerHtml.'","sell":"'.$b[13]->innerHtml.'"},"RUB":{"buy":"'.$b[18]->innerHtml.'","sell":"'.$b[19]->innerHtml.'"}}';

    self::saveDb('ლიბერთი ბანკი','Liberty Bank',$body,5);


}

public function credo()
{
    $templateHtml = file_get_contents('https://credobank.ge/exchange-rates/?rate=credo');

    // add: "<br>" to "<li>"
    $htmlTmp = HtmlDomParser::str_get_html($templateHtml);
    $b = $htmlTmp->findMulti('.currency-rate-box')->findMulti('.rate-value');
    $body = '{"USD":{"buy":"'.$b[1]->innerHtml.'","sell":"'.$b[2]->innerHtml.'"},"EUR":{"buy":"'.$b[8]->innerHtml.'","sell":"'.$b[9]->innerHtml.'"},"RUB":{"buy":"'.$b[15]->innerHtml.'","sell":"'.$b[16]->innerHtml.'"}}';

    self::saveDb('კრედო ბანკი','Credo Bank',$body,6);
}

public function khalik()
{
    $templateHtml = file_get_contents('https://halykbank.ge/ka/individuals/currency');

    // add: "<br>" to "<li>"
    $htmlTmp = HtmlDomParser::str_get_html($templateHtml);
    $b = $htmlTmp->findMulti('.currencies__tab-pane')->findMulti('.table-bordered')->findMulti('td');
    $body = '{"USD":{"buy":"'.$b[1]->innerHtml.'","sell":"'.$b[2]->innerHtml.'"},"EUR":{"buy":"'.$b[4]->innerHtml.'","sell":"'.$b[5]->innerHtml.'"},"GBP":{"buy":"'.$b[7]->innerHtml.'","sell":"'.$b[8]->innerHtml.'"},"RUB":{"buy":"'.$b[10]->innerHtml.'","sell":"'.$b[11]->innerHtml.'"}}';
 
    self::saveDb('ხალიკ ბანკი','Halyk Bank',$body,7);
}


public static function procredit(){
   
    $templateHtml = file_get_contents('https://www.procreditbank.ge/ge/exchange');
 
    // add: "<br>" to "<li>"
    $htmlTmp = HtmlDomParser::str_get_html($templateHtml);
   
 $buy = $htmlTmp->findMulti('.exchange-buy');
 $sell = $htmlTmp->findMulti('.exchange-sell');
    $body = '{"USD":{"buy":"'.$buy[0]->innerHtml.'","sell":"'.$sell[0]->innerHtml.'"},"EUR":{"buy":"'.$buy[1]->innerHtml.'","sell":"'.$buy[1]->innerHtml.'"},"GBP":{"buy":"'.$buy[2]->innerHtml.'","sell":"'.$sell[2]->innerHtml.'"},"RUB":{"buy":"'.$buy[3]->innerHtml.'","sell":"'.$sell[3]->innerHtml.'"}}';


    
    self::saveDb('პროკრედიტ ბანკი','ProCredit Bank',$body,8);
    
}





public function rico(){
    $templateHtml = file_get_contents('https://www.rico.ge/ka');

    // add: "<br>" to "<li>"
    $htmlTmp = HtmlDomParser::str_get_html($templateHtml);
    $b = $htmlTmp->findOne('#rates')->findMulti('.text-primary');
  
   
    $body = '{"USD":{"buy":"'.$b[0]->innerHtml.'","sell":"'.$b[1]->innerHtml.'"},"EUR":{"buy":"'.$b[2]->innerHtml.'","sell":"'.$b[3]->innerHtml.'"},"GBP":{"buy":"'.$b[8]->innerHtml.'","sell":"'.$b[9]->innerHtml.'"},"RUB":{"buy":"'.$b[4]->innerHtml.'","sell":"'.$b[5]->innerHtml.'"}}';

    self::saveDb('რიკო ჯგუფი','Rico Group',$body,1,2);
    //var_dump( $body);
}


public function valuto(){
    $templateHtml = file_get_contents('https://valuto.ge/wp-json/rest-currency-list/v3/currencies');

$json = json_decode($templateHtml );
$val =$json->data;
$curs = $val->currencies;

    $body = '{"USD":{"buy":"'.$curs->USDGEL->buy.'","sell":"'.$curs->USDGEL->sell.'"},"EUR":{"buy":"'.$curs->EURGEL->buy.'","sell":"'.$curs->EURGEL->sell.'"},"GBP":{"buy":"'.$curs->GBPGEL->buy.'","sell":"'.$curs->GBPGEL->sell.'"},"RUB":{"buy":"'.$curs->RURGEL->sell.'","sell":"'.$curs->RURGEL->sell.'"}}';

   self::saveDb('ვალუტო', 'Valuto',$body,2,2);
  //  var_dump( $body);
 


}

public function intelexpress(){
    $templateHtml = file_get_contents('http://ge.inteliexpress.net/_fragment?_path=default%3DLoading...%26_format%3Dhtml%26_locale%3Dge%26_controller%3DAppBundle%253AFrontend%255CMain%253AgetCurrency&_hash=0kkhjlQcYSXJcUwf5ZgqQxdPvXugZ9LjOjMyqSVjRtM%3D');

    // add: "<br>" to "<li>"
    $htmlTmp = HtmlDomParser::str_get_html($templateHtml);
    $b = $htmlTmp->findOne('#currency')->findMulti('td');
 
    $body = '{"USD":{"buy":"'.$b[2]->innerHtml.'","sell":"'.$b[3]->innerHtml.'"},"EUR":{"buy":"'.$b[6]->innerHtml.'","sell":"'.$b[7]->innerHtml.'"},"GBP":{"buy":"'.$b[10]->innerHtml.'","sell":"'.$b[11]->innerHtml.'"},"RUB":{"buy":"'.$b[18]->innerHtml.'","sell":"'.$b[19]->innerHtml.'"}}';

    self::saveDb('INTELIEXPRESS','INTELIEXPRESS',$body,3,2);
    //var_dump( $body);
 


}



public function cristal(){
    $arrContextOptions=array(
        "ssl"=>array(
              "verify_peer"=>false,
              "verify_peer_name"=>false,
          ),
      );  
$templateHtml = file_get_contents('https://crystal.ge/api/wi/rate/v1/cryst?key=52ef35743f3c4f5027d82f051c258241', false, stream_context_create($arrContextOptions));

$json = json_decode($templateHtml);
$val =$json->data;
$curs = json_decode($val)->data->CurrencyRate;

    $body = '{"USD":{"buy":"'.$curs[0]->AMOUNT_BUY.'","sell":"'.$curs[0]->AMOUNT_SELL.'"},"EUR":{"buy":"'.$curs[4]->AMOUNT_BUY.'","sell":"'.$curs[4]->AMOUNT_SELL.'"},"GBP":{"buy":"'.$curs[3]->AMOUNT_BUY.'","sell":"'.$curs[3]->AMOUNT_SELL.'"},"RUB":{"buy":"'.$curs[2]->AMOUNT_BUY.'","sell":"'.$curs[2]->AMOUNT_SELL.'"}}';

   self::saveDb('კრისტალი','Crystal',$body,4,2);
   // var_dump( $body);
 


}
public function fincredit(){
    $templateHtml = file_get_contents('http://fincredit.ge/');

    // add: "<br>" to "<li>"
    $htmlTmp = HtmlDomParser::str_get_html($templateHtml);
    $b = $htmlTmp->findOne('#t2')->findMulti('td');
 
    $body = '{"USD":{"buy":"'.$b[1]->innerHtml.'","sell":"'.$b[2]->innerHtml.'"},"EUR":{"buy":"'.$b[4]->innerHtml.'","sell":"'.$b[5]->innerHtml.'"}}';

    self::saveDb('ფინკრედიტი','Fin Credit',$body,5,2);

 


}
public function girocredit(){
    $templateHtml = file_get_contents('https://girocredit.ge/');

    // add: "<br>" to "<li>"
    $htmlTmp = HtmlDomParser::str_get_html($templateHtml);
    $b = $htmlTmp->findOne('.tbl-content')->findMulti('td');
  

    $body = '{"USD":{"buy":"'.$b[1]->innerHtml.'","sell":"'.$b[2]->innerHtml.'"},"EUR":{"buy":"'.$b[5]->innerHtml.'","sell":"'.$b[6]->innerHtml.'"},"GBP":{"buy":"'.$b[9]->innerHtml.'","sell":"'.$b[10]->innerHtml.'"},"RUB":{"buy":"'.$b[13]->innerHtml.'","sell":"'.$b[14]->innerHtml.'"}}';

    self::saveDb('გირო კრედიტი','Giro Credit',$body,6,2);
    //var_dump( $body);
 


}
public static function  saveDb($bankka,$banken,$body,$bid,$status = 1){
    $cur = new currencies();
    $cur->bank_ka = $bankka;
    $cur->bank_en = $banken;
    $cur->body = $body;
    $cur->bid = $bid;
     $cur->status_id = $status;
    $cur->save();
}

}
