<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use App\Models\nn_slider_lang;

use DB;

use LaravelLocalization;



class nn_slider extends Model

{

    protected $table = 'nn_slider';



    protected $fillable = [

        'position',

    ];



    //_-_ CMS SIDE

    /*

    	Get function

    */

    public function lang()

    {

        return $this->hasOne('App\Models\nn_slider_lang', 'slider_id', 'id')
            ->where('lang', getCurrentLocale());

    }


    public static function getSliderItem()

    {

        $sliderItem = DB::table('nn_slider')

            ->where(['nn_slider_lang.lang' => getCurrentLocale()])

            ->join('nn_slider_lang', 'nn_slider.id', '=', 'nn_slider_lang.slider_id')

            ->select('nn_slider.id', 'nn_slider_lang.slider_id', 'nn_slider_lang.name', 'nn_slider_lang.description', 'nn_slider_lang.imgurl', 'nn_slider_lang.link_1', 'nn_slider_lang.link_2', 'nn_slider_lang.slider_id')

            ->orderBy('nn_slider.position', 'asc')

            ->get();



        return $sliderItem;

    }



    /*

        Get nn_slider item filter by slider_id

    */

    public static function getSliderItemBySliderId($slider_id)

    {

        $sliderItem = nn_slider_lang::where(['slider_id' => $slider_id])->get();



        return $sliderItem;

    }



    /*

    	Create function

    */



    public static function createSliderItem($input)

    {

        // prepare default input array values

        $maxSliderItemPosition = self::select(DB::raw('MAX(position) AS position'))->get();



        // fill default input values array

        $inputDefault = [];

        $inputDefault['position'] = ($maxSliderItemPosition[0]->position !== null) ? ($maxSliderItemPosition[0]->position + 1) : 0;



        // insert input value array in db

        $sliderItem = self::create($inputDefault);



        // prepare lang input array values

        $insertedId = $sliderItem->id;



        // create sliderLang item

        $inputLang = [];

        $inputLang['name'] = $input->name;

        $inputLang['description'] = $input->description;

        $inputLang['imgurl'] = $input->imgurl;

        $inputLang['link_name_1'] = $input->link_name;

        // $inputLang['link_name_2'] = $input->link_name_2;

        $inputLang['link_1'] = $input->link;

        // $inputLang['link_2'] = $input->link_2;

        $inputLang['slider_id'] = $insertedId;


        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){



            $inputLang['lang'] = $localeCode;


            nn_slider_lang::create($inputLang);


        }

    }



    /*

    	Update slider positions

    */

    public static function updateSliderItemPosition($arr)

    {

        foreach($arr as $val){



            DB::table('nn_slider')

                ->where('id', $val->id)

                ->update(array('position' => $val->position));



        }

    }



	/*

    	Delete all items from slider

    */

    public static function deleteAllItems()

    {

        DB::statement("SET foreign_key_checks=0");

		self::truncate();

		DB::statement("SET foreign_key_checks=1");

    }



    /*

        Update function

    */

    public static function updateSliderItem($input)

    {

        // fill input values array

        $inputLang = [];

        $inputLang['name'] = $input->name;

        $inputLang['description'] = $input->description;



        if(isset($input->imgurl)){

            $inputLang['imgurl'] = $input->imgurl;

        }


        $inputLang['link_name_1'] = $input->link_name_1;

        // $inputLang['link_name_2'] = $input->link_name_2;

        $inputLang['link_1'] = $input->link_1;

        // $inputLang['link_2'] = $input->link_2;



        nn_slider_lang::where('id', $input->id)->update($inputLang);

    }



    //_-_ SITE SIDE

    public static function getSliderForSite()

    {

        $slider = DB::table('nn_slider')

            ->where(['nn_slider_lang.lang' => getCurrentLocale()])

            ->join('nn_slider_lang', 'nn_slider.id', '=', 'nn_slider_lang.slider_id')

            ->select('nn_slider.id', 'nn_slider.position', 'nn_slider_lang.name', 'nn_slider_lang.description', 'nn_slider_lang.imgurl', 'nn_slider_lang.link_name_1', 'nn_slider_lang.link_name_2', 'nn_slider_lang.link_1', 'nn_slider_lang.link_2')

            ->orderBy('nn_slider.position', 'asc')

            ->get();



        return $slider;

    }

}

