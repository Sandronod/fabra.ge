<?php





namespace App\Models;





use Illuminate\Database\Eloquent\Model;





class nn_catalog_lang extends Model


{


    protected $table = 'nn_catalog_lang';





    protected $fillable = [


    	'name',


    	'imgurl',


    	'body',


    	'description',
		'keywords',
		'videoUrl',
		'embed',

		'sub_title',
		'info_label',
		'services_list',
		'info_list',
		'info_list',



    	'lang',


    	
		
	
		'catalog_id',

		









    ];


}


