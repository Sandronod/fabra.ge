<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use DB;

use LaravelLocalization;



class currencies extends Model

{

    protected $table = 'currencies';



    protected $fillable = [

        'bank_ka',

    	'bank_en',

        'body'


    ];



    

}

