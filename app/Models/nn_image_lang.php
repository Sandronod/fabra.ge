<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nn_image_lang extends Model
{
    protected $table = 'nn_image_lang';

    protected $fillable = [
        'name',
        'description',
        'imgurl',
        'lang',
        'image_id'
    ];
}
