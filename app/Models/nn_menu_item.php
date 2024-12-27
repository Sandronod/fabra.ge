<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nn_menu_item extends Model
{
    protected $table = 'nn_menu_item';
    
    public function nn_menu_items_lang()
    {
		return $this->hasMany('App\Models\nn_menu_item_lang');
	}
}
