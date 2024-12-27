<?php

namespace App\Http\Controllers\nn_site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_slider;
use App\Models\nn_catalog;
use App\Models\nn_menu_item;

class SiteDynamicRouter extends SiteController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function routeGenerator($slug)
    {
        $menuitem = nn_menu_item::where('slug', $slug)
                                ->leftJoin('nn_collection' , 'nn_collection.id', '=', 'nn_menu_item.collection_id')
                                ->select('nn_menu_item.id', 'nn_collection.type','nn_collection.id','nn_menu_item.type as itemtype')
                                ->first();

        if (! $menuitem) {
            abort(404);
        }

        if ($menuitem->itemtype == 'text') {
            $data['isTextPage'] = 1;
            
            $data['item'] = nn_menu_item::join('nn_menu_item_lang', 'nn_menu_item_lang.nn_menu_item_id', '=', 'nn_menu_item.id')
                                        ->where([['nn_menu_item.slug', $slug], ['nn_menu_item_lang.lang', getCurrentLocale()]])
                                        ->select('nn_menu_item.id', 'nn_menu_item_lang.name', 'nn_menu_item_lang.body', 'nn_menu_item_lang.description')
                                        ->first();

            return view('nn_site.pages.'.$menuitem->itemtype, $data);
        }
        if ($menuitem->itemtype == 'contact') {
            $data['isContactPage'] = 1;
            $data['item'] = nn_menu_item::join('nn_menu_item_lang', 'nn_menu_item_lang.nn_menu_item_id', '=', 'nn_menu_item.id')
                                        ->where([['nn_menu_item.slug', $slug], ['nn_menu_item_lang.lang', getCurrentLocale()]])
                                        ->select('nn_menu_item.id', 'nn_menu_item_lang.name', 'nn_menu_item_lang.description')
                                        ->first();

            return view('nn_site.pages.contact', $data);
        }
        if ($menuitem->itemtype != 'collection') {
            $data['items'] = self::getCatalogs($slug);

            return view('nn_site.pages.'.$menuitem->itemtype, $data);
        }
        if (isset($menuitem->type)) {
            $data['items'] = self::getCatalogs($menuitem->id);
            
            return view('nn_site.pages.'.$menuitem->type, $data);
        } else {
            abort(404);
        }
    }

    public static function getCatalogs($id)
    {
        $items = nn_catalog::where('nn_catalog.collection_id' , $id)
            ->join('nn_catalog_lang', 'nn_catalog_lang.catalog_id','=', 'nn_catalog.id')
            ->where('nn_catalog_lang.lang', getCurrentLocale())
            ->select
            (
                'nn_catalog.slug',
                'nn_catalog.price',
                'nn_catalog_lang.name',
                'nn_catalog_lang.imgurl',
                'nn_catalog_lang.body',
                'nn_catalog_lang.description',
                'nn_catalog_lang.keywords',
                'nn_catalog_lang.sub_title',
                'nn_catalog_lang.info_label',
                'nn_catalog_lang.services_list',
                'nn_catalog_lang.info_list',
                'nn_catalog_lang.created_at',
                'nn_catalog_lang.updated_at'
            )
            ->orderBy('nn_catalog.position', 'asc')
            ->orderBy('nn_catalog.created_at', 'desc')
            ->paginate(50);

        return $items;
    }

    public static function getText($slug)
    {
        $items = nn_menu_item::where('nn_menu_item.slug' , $slug)
            ->join('nn_menu_item_lang', 'nn_menu_item_lang.menu_item_id','=', 'nn_menu_item.id')
            ->where('nn_menu_item_lang.lang', getCurrentLocale())->paginate(50);
    }
}
