<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class nn_category_lang extends Model

{

    protected $table = 'nn_category_lang';



    protected $fillable = [

    	'name',

    	'imgurl',

    	'description',

    	'lang',

    	'category_id'

    ];

	
	
	
	// public  function getcategoryf(){
	// 	return "";
	// }
}

