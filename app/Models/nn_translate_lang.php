<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nn_translate_lang extends Model
{
	protected $table = 'nn_translate_lang';

    protected $fillable = [
    	'name',
    	'translate_id',
    	'lang',
    ];
}