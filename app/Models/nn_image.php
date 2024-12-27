<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use LaravelLocalization;

class nn_image extends Model
{
    protected $table = 'nn_image';

    protected $fillable = [
        'position',
        'main_id',
        'route_name',
        'route_id'
    ];

    /*
    	Get function
    */
    public static function getImage($route_name, $route_id)
    {
        $image = DB::table('nn_image')
            ->where(['nn_image.route_name' => $route_name, 'nn_image.route_id' => $route_id, 'nn_image_lang.lang' => getCurrentLocale()])
            ->join('nn_image_lang', 'nn_image.id', '=', 'nn_image_lang.image_id')
            ->select('nn_image.id', 'nn_image_lang.name', 'nn_image_lang.description', 'nn_image_lang.imgurl', 'nn_image_lang.image_id')
            ->orderBy('nn_image.position', 'asc')
            ->get();

        return $image;
    }

    /*
        Get nn_gallery_item filter by image_id
    */
    public static function getImageByImageId($image_id)
    {
        $image = nn_image_lang::where(['image_id' => $image_id])->get();

        return $image;
    }

    /*
    	Create function
    */
    public static function createImage($input)
    {
        // prepare default input array values
        $maxImageItemPosition = self::select(DB::raw('MAX(position) AS position'))->get();

        // fill default input values array
        $inputDefault = [];
        $inputDefault['name'] = $input->name;
        $inputDefault['description'] = $input->description;
        $inputDefault['imgurl'] = $input->imgurl;
        $inputDefault['position'] = ($maxImageItemPosition[0]->position !== null) ? ($maxImageItemPosition[0]->position + 1) : 0;
        $inputDefault['main_id'] = $input->main_id;
        $inputDefault['route_name'] = $input->route_name;
        $inputDefault['route_id'] = $input->route_id;

        // insert input value array in db
        $fileItem = self::create($inputDefault);

        // prepare lang input array values
        $insertedId = $fileItem->id;

        // create galleryItemLang
        $inputLang = [];
        $inputLang['name'] = $input->name;
        $inputLang['description'] = $input->description;
        $inputLang['imgurl'] = $input->imgurl;
        $inputLang['image_id'] = $insertedId;

        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){

            $inputLang['lang'] = $localeCode;

            nn_image_lang::create($inputLang);

        }
    }

    /*
    	Update file positions
    */
    public static function updateImagePosition($arr)
    {
        foreach($arr as $val){

            DB::table('nn_image')
                ->where('id', $val->id)
                ->update(array('position' => $val->position));

        }
    }

    /*
    	Delete all items from file where route_name = $route_name and route_id = $route_id
    */
    public static function deleteAllImages($route_name, $route_id)
    {
        self::where(['route_name' => $route_name, 'route_id' => $route_id])->delete();
    }

    /*
        Update function
    */
    public static function updateImage($input)
    {
        // fill input values array
        $inputLang = [];
        $inputLang['name'] = $input->name;
        $inputLang['description'] = $input->description;

        if(isset($input->imgurl)){

            $inputLang['imgurl'] = $input->imgurl;

        }

        nn_image_lang::where('id', $input->id)->update($inputLang);
    }

    /*
        Delete item from Main collection, menuitem where they are attached
    */
    public static function deleteFromMainCM($main_id, $route_name)
    {
        self::where(['main_id' => $main_id, 'route_name' => $route_name])->delete();
    }

    /*
        Delete item from collection, menuitem where they are attached
    */
    public static function deleteFromCM($route_name, $route_id)
    {
        self::where(['route_name' => $route_name, 'route_id' => $route_id])->delete();
    }
}
