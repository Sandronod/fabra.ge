<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nn_thematic_category_lang extends Model
{
    protected $table = 'nn_thematic_category_lang';

    protected $fillable = [
    	'name',
    	'imgurl',
    	'description',
    	'lang',
    	'thematic_category_id'
    ];
}
