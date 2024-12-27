<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class nn_slider_lang extends Model

{

    protected $table = 'nn_slider_lang';



    protected $fillable = [

        'name',

        'description',

        'imgurl',

        'link_name',

        'link_1',

        'link_2',

        'lang',

        'slider_id',

    ];

}

