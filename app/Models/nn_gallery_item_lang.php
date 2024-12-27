<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nn_gallery_item_lang extends Model
{
    protected $table = 'nn_gallery_item_lang';

    protected $fillable = [
        'name',
        'description',
        'imgurl',
        'lang',
        'gallery_item_id',
    ];
}
