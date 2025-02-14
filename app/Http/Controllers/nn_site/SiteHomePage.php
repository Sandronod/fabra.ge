<?php

namespace App\Http\Controllers\nn_site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_slider;
use App\Models\nn_catalog;
use App\Models\nn_category;
use App\Models\nn_menu_item;
use App\Models\nn_collection;
use HttpRequest;



class SiteHomePage extends SiteController
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


    public function index(Request $request)
    {
      $data["slider"] = nn_slider::orderBy('position', 'asc')->get();

      $data["whys"] = nn_collection::find(15);
      $data['whys']->catalog = $data['whys']->catalog->sortByDesc('position');

      $data["bullets"] = nn_collection::find(23);
      $data['bullets']->catalog = $data['bullets']->catalog->sortByDesc('position');
      
      $data["clients"] = nn_collection::find(14);
      $data['clients']->catalog = $data['clients']->catalog->sortByDesc('position');


     // $data["products1"] = nn_menu_item::orderBy('position', 'asc')->where('category_id', '>', 0)->orderByRaw('RAND()')->get()->take(4);
        //  $catalog = nn_catalog::find(66);
        //  if(isset($catalog->category_id)){
        //      $category_id = $catalog->category_id;
        //  }else{
        //         $category = nn_category::orderByRaw('RAND()')->get()->first();
        //         $category_id = $category->category_id;
        //  }
        // $catalogs = nn_catalog::where('category_id', $category_id)->where('show_home', 0)->
        //     where('id', '!=', 66)->orderByRaw('RAND()')->get()->take(4);
        // $data["product1_menu"] = nn_menu_item::where('category_id', $category_id)->orderBy('position', 'asc')->first();
        // $data["products1"] = $catalogs;

        $catalogs2 = nn_catalog::where('show_home', 1)->orderBy('position', 'asc')->get();
        $data["products2"] = $catalogs2;

      return view('nn_site.pages.home', $data);
    }



}
