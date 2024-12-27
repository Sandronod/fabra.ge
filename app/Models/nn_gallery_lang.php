<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nn_gallery_lang extends Model
{
    protected $table = 'nn_gallery_lang';

    protected $fillable = [
    	'name',
    	'description',
    	'lang',
    	'gallery_id'
    ];
}
