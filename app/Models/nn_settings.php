<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\nn_color_lang;
use DB;
use LaravelLocalization;

class nn_settings extends Model
{


    protected $table = 'nn_settings';

    protected $fillable = [
     	'gafrtxilebaHeliumi_ka',
		'gafrtxilebaHeliumi_en',
		'wesebi_ka',
		'wesebi_en',
		'mitanisPasi',
		'mitanisPasiLimit',
		'MitanisTexti_ka',
		'MitanisTexti_en',
		'mitanisfasiinfo_ka',
		'mitanisfasiinfo_en',
    ];
public static function SaveSettings($input)
    {

try { 
   $settings = nn_settings::where('id', '!=', '0')

            ->firstOrFail();
		

       $dd = $settings->update($input);
	  return "ok"; 

} catch(\Illuminate\Database\QueryException $ex){ 
  var_dump($ex->getMessage()); 
  // Note any method of class PDOException can be called on $ex.
}

		
    }
    
    public static function getSettings($ids)
    {
        $color = DB::table('nn_color')
            ->where(['nn_color_lang.lang' => getCurrentLocale()])
            ->whereIn('nn_color.id', $ids)
            ->join('nn_color_lang', 'nn_color.id', '=', 'nn_color_lang.color_id')
            ->select('nn_color.id', 'nn_color_lang.name', 'nn_color.color_code')
            ->orderBy('nn_color.created_at', 'desc')
            ->get();

        return $color;
    }
}
