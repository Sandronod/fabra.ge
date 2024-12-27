<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nn_collection_lang extends Model
{
    protected $table = 'nn_collection_lang';

    protected $fillable = [
    	'name',
    	'description',
    	'lang',
        'collection_id'
    ];
}