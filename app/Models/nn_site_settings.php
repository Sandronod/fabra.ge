<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nn_site_settings extends Model
{
	protected $table = 'nn_site_settings';

    protected $fillable = [
    	'email',
		'latitude',
		'longitude',
    	'footer_text',
    ];
}
