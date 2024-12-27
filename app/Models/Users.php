<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = [
    	'email',
    	'name',
    	'surname',
    	'password',
    	'imgurl'
    ];
}