<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use DB;



class nn_menu extends Model

{

    protected $table = 'nn_menu';



    //_-_ CMS

	public function nn_menu_items()

    {

		return $this->hasMany('App\Models\nn_menu_item')
            ->where('parent_id', 0)->orderBy('position', 'asc');

	}

	public function nn_menuitem_order()

    {

		return $this->hasOne('App\Models\nn_menuitem_order');

	}



    //_-_ SITE SIDE

    /*

        Get Menu

    */

    public static function getPrimaryMenu()

    {

        $menu = DB::table('nn_menu')

            ->where(['nn_menu.primary' => 1, 'nn_menu_item_lang.lang' => getCurrentLocale()])

            ->join('nn_menu_item', 'nn_menu.id', '=', 'nn_menu_item.nn_menu_id')

            ->join('nn_menu_item_lang', 'nn_menu_item.id', '=', 'nn_menu_item_lang.nn_menu_item_id')

            ->select('nn_menu_item.id','nn_menu_item.position', 'nn_menu_item.slug', 'nn_menu_item.type', 'nn_menu_item.parent_id', 'nn_menu_item_lang.name', 'nn_menu_item_lang.link')

            ->orderBy('nn_menu_item.position', 'asc')

            ->get();



        return $menu;

    }



    /*

        Get Menu By Name

    */

    public static function getMenuByName($menuName, $orderBy = 'asc')

    {

        $menu = DB::table('nn_menu')

            ->where(['nn_menu.name' => $menuName, 'nn_menu_item_lang.lang' => getCurrentLocale()])

            ->join('nn_menu_item', 'nn_menu.id', '=', 'nn_menu_item.nn_menu_id')

            ->join('nn_menu_item_lang', 'nn_menu_item.id', '=', 'nn_menu_item_lang.nn_menu_item_id')

            ->select('nn_menu_item.id', 'nn_menu_item.slug', 'nn_menu_item.type', 'nn_menu_item.parent_id', 'nn_menu_item_lang.name', 'nn_menu_item_lang.link')

            ->orderBy('nn_menu_item.position', $orderBy)

            ->get();



        return $menu;

    }

}

