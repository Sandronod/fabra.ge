<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use LaravelLocalization;

class nn_file extends Model
{
    protected $table = 'nn_file';

    protected $fillable = [
        'position',
    	'main_id',
        'route_name',
        'route_id'
    ];

    /*
    	Get function
    */
    public static function getFile($route_name, $route_id)
    {
        $file = DB::table('nn_file')
            ->where(['nn_file.route_name' => $route_name, 'nn_file.route_id' => $route_id, 'nn_file_lang.lang' => getCurrentLocale()])
            ->join('nn_file_lang', 'nn_file.id', '=', 'nn_file_lang.file_id')
            ->select('nn_file.id', 'nn_file_lang.name', 'nn_file_lang.description', 'nn_file_lang.fileurl', 'nn_file_lang.file_id')
            ->orderBy('nn_file.position', 'asc')
            ->get();

        return $file;
    }

    /*
        Get nn_gallery_item filter by file_id
    */
    public static function getFileByFileId($file_id)
    {
        $file = nn_file_lang::where(['file_id' => $file_id])->get();

        return $file;
    }

    /*
    	Create function
    */
    public static function createFile($input)
    {
        // prepare default input array values
        $maxFileItemPosition = self::select(DB::raw('MAX(position) AS position'))->get();

        // fill default input values array
        $inputDefault = [];
        $inputDefault['name'] = $input->name;
        $inputDefault['description'] = $input->description;
        $inputDefault['fileurl'] = $input->fileurl;
        $inputDefault['position'] = ($maxFileItemPosition[0]->position !== null) ? ($maxFileItemPosition[0]->position + 1) : 0;
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
        $inputLang['fileurl'] = $input->fileurl;
        $inputLang['file_id'] = $insertedId;

        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){

            $inputLang['lang'] = $localeCode;

            nn_file_lang::create($inputLang);

        }
    }

    /*
    	Update file positions
    */
    public static function updateFilePosition($arr)
    {
        foreach($arr as $val){

            DB::table('nn_file')
                ->where('id', $val->id)
                ->update(array('position' => $val->position));

        }
    }

    /*
    	Delete all items from file where route_name = $route_name and route_id = $route_id
    */
    public static function deleteAllFiles($route_name, $route_id)
    {
        self::where(['route_name' => $route_name, 'route_id' => $route_id])->delete();
    }

    /*
        Update function
    */
    public static function updateFile($input)
    {
        // fill input values array
        $inputLang = [];
        $inputLang['name'] = $input->name;
        $inputLang['description'] = $input->description;

        if(isset($input->fileurl)){

            $inputLang['fileurl'] = $input->fileurl;
            
        }

        nn_file_lang::where('id', $input->id)->update($inputLang);
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
