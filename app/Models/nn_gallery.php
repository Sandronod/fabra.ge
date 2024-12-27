<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nn_gallery_lang;
use DB;
use LaravelLocalization;

class nn_gallery extends Model
{
    protected $table = 'nn_gallery';

    protected $fillable = [
        'slug',
        'collection_id',
    ];

    /*
    	Get function
    */
    public static function getGallery($id)
    {
    	$gallery = DB::table('nn_gallery')
                            ->where(['nn_gallery_lang.lang' => getCurrentLocale(), 'collection_id' => $id])
                            ->join('nn_gallery_lang', 'nn_gallery.id', '=', 'nn_gallery_lang.gallery_id')
                            ->select('nn_gallery.id', 'nn_gallery_lang.name', 'nn_gallery_lang.description')
                            ->orderBy('nn_gallery.created_at','desc')
                            ->get();

        return $gallery;
    }

	/*
    	Create function
    */
    public static function createGallery($input)
    {
        $gallery = self::create($input);

    	$insertedId = $gallery->id;
        $input['gallery_id'] = $insertedId;

        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){

            $input['lang'] = $localeCode;

            nn_gallery_lang::create($input);
            
        }

        return $gallery;
    }

    /*
        Edit function
    */
    public static function editGallery($id)
    {
       return nn_gallery_lang::where('gallery_id', '=', $id)->get();
    }

    /*
        Update function
    */
    public static function updateGallery($input)
    {
        $galleryLang = nn_gallery_lang::where('id', '=', $input['id'])
                                    ->where('lang', '=', $input['lang'])
                                    ->firstOrFail();
        $galleryLang->update($input);
    }
}
