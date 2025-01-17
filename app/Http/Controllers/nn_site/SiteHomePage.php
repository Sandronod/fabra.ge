<?php

namespace App\Http\Controllers\nn_site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_slider;
use App\Models\nn_catalog;
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
      $data["clients"] = nn_collection::find(14);
      $data["products1"] = nn_menu_item::orderBy('position', 'asc')->where('category_id', '>', 0)->orderByRaw('RAND()')->get()->take(4);

      $data["products2"] = nn_collection::find(18);

      return view('nn_site.pages.home',$data);
    }



}
