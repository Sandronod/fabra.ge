<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nn_file_lang extends Model
{
    protected $table = 'nn_file_lang';

    protected $fillable = [
        'name',
        'description',
        'fileurl',
        'lang',
        'file_id'
    ];
}
