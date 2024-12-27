<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nn_gallery_item_lang;
use DB;
use LaravelLocalization;

class nn_gallery_item extends Model
{
    protected $table = 'nn_gallery_item';

    protected $fillable = [
        'position',
        'gallery_id'
    ];

    /*
    	Get function
    */
    public static function getGalleryItem($id)
    {
        $galleryItem = DB::table('nn_gallery_item')
            ->where(['gallery_id' => $id, 'nn_gallery_item_lang.lang' => getCurrentLocale()])
            ->join('nn_gallery_item_lang', 'nn_gallery_item.id', '=', 'nn_gallery_item_lang.gallery_item_id')
            ->select('nn_gallery_item.id', 'nn_gallery_item.gallery_id', 'nn_gallery_item_lang.name', 'nn_gallery_item_lang.description', 'nn_gallery_item_lang.imgurl', 'nn_gallery_item_lang.gallery_item_id')
            ->orderBy('nn_gallery_item.position', 'asc')
            ->get();

        return $galleryItem;
    }

    /*
        Get nn_gallery_item filter by gallery_item_id
    */
    public static function getGalleryItemByGalleryItemId($galleryItem_id)
    {
        $galleryItem = nn_gallery_item_lang::where(['gallery_item_id' => $galleryItem_id])->get();

        return $galleryItem;
    }

    /*
        Get nn_gallery_item filter by gallery_item_id and lang
    */
    public static function getGalleryItemByGalleryItemIdAndLang($galleryItem_id, $lang)
    {
        $galleryItem = nn_gallery_item_lang::where(['gallery_item_id' => $galleryItem_id, 'lang' => $lang])->get();

        return $galleryItem;
    }

    /*
    	Create function
    */
    public static function createGalleryItem($input)
    {
        // prepare default input array values
        $maxGalleryItemPosition = self::select(DB::raw('MAX(position) AS position'))->get();

        // fill default input values array
        $inputDefault = [];
        $inputDefault['position'] = ($maxGalleryItemPosition[0]->position !== null) ? ($maxGalleryItemPosition[0]->position + 1) : 0;
        $inputDefault['gallery_id'] = $input->gallery_id;

        // insert input value array in db
        $galleryItem = self::create($inputDefault);

        // prepare lang input array values
        $insertedId = $galleryItem->id;

        // create galleryItemLang
        $inputLang = [];
        $inputLang['name'] = $input->name;
        $inputLang['description'] = $input->description;
        $inputLang['imgurl'] = $input->imgurl;
        $inputLang['gallery_item_id'] = $insertedId;

        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){

            $inputLang['lang'] = $localeCode;

            nn_gallery_item_lang::create($inputLang);

        }
    }

    /*
    	Update gallery positions
    */
    public static function updateGalleryItemPosition($arr)
    {
        foreach($arr as $val){

            DB::table('nn_gallery_item')
                ->where('id', $val->id)
                ->update(array('position' => $val->position));

        }
    }

    /*
    	Get filenames from nn_gallery_item filter by gallery_id
    */
    // public static function getFileNames($gallery_id)
    // {
    //     $gallery_filenames = DB::table('nn_gallery_item')
    //         ->where(['nn_gallery_item.gallery_id' => $gallery_id])
    //         ->join('nn_gallery_item_lang', 'nn_gallery_item.id', '=', 'nn_gallery_item_lang.gallery_item_id')
    //         ->select('nn_gallery_item_lang.filename')
    //         ->get();

    //     return $gallery_filenames;
    // }

    /*
    	Delete all items from gallery items where gallery_id = $gallery_id
    */
    public static function deleteAllItems($gallery_id)
    {
        self::where('gallery_id', $gallery_id)->delete();
    }

    /*
        Update function
    */
    public static function updateGalleryItem($input)
    {
        // fill input values array
        $inputLang = [];
        $inputLang['name'] = $input->name;
        $inputLang['description'] = $input->description;

        if(isset($input->imgurl)){

            $inputLang['imgurl'] = $input->imgurl;
            
        }

        nn_gallery_item_lang::where('id', $input->id)->update($inputLang);
    }
}