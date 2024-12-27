<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\nn_translate_lang;
use DB;

use LaravelLocalization;

class nn_translate extends Model
{
    protected $table = 'nn_translate';

    protected $fillable = [
        'trans_key',
    ];

    public static function getTranslate()
    {
    	$translate = DB::table('nn_translate')
                            ->join('nn_translate_lang', 'nn_translate_lang.translate_id', '=', 'nn_translate.id')
                            ->where('nn_translate_lang.lang', getCurrentLocale())
                            ->select('nn_translate.id', 'nn_translate.trans_key', 'nn_translate_lang.name')
                            ->orderBy('nn_translate.created_at','desc')
                            ->get();

        return $translate;
    }

    public static function createTranslate($input)
    {
        $translate = self::create($input);

    	$insertedId = $translate->id;
        $input['translate_id'] = $insertedId;

        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){

            $input['lang'] = $localeCode;
            nn_translate_lang::create($input);
        }

        return $translate;
    }

    public static function editTranslate($id)
    {
       return nn_translate::where('nn_translate.id', '=', $id)
                        ->join('nn_translate_lang', 'nn_translate_lang.translate_id', '=', 'nn_translate.id')
                        ->select('nn_translate_lang.id', 'nn_translate.trans_key', 'nn_translate_lang.name')
                        ->get();
    }

    public static function updateTranslate($input)
    {
        $translateLang = nn_translate_lang::where('id', '=', $input['id'])
                                    ->where('lang', '=', $input['lang'])
                                    ->firstOrFail();

        $check = $translateLang->update($input);

        return $check;
    }
}


