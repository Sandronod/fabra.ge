<?php

namespace App\Http\Controllers\nn_cms;

use Illuminate\Routing\Router;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use DB;

class ManagerDashboard extends ManagerSiteController
{
    // Auth check
//    public function __construct()
//    {
//        parent::__construct();
//        $this->middleware('auth');
//    }

    public function index()
    {
        //__ count menus area
        $data['countMenus'] = DB::table('nn_menu')->count();

        //__ count total (primary) menu items (pages) area
        // get primary menu if it exists
        $checkPrimaryMenu = DB::table('nn_menu')
                            ->where('primary', 1)->count();

        if($checkPrimaryMenu){ // check if primary menu exist
        // primaryMenuId
        $data['primaryMenuId'] = DB::table('nn_menu')
                            ->where('primary', 1)
                            ->select('id')
                            ->get()[0]->id;
        // total menu items (pages)
        $data['totalMenuItems'] = DB::table('nn_menu_item')
                            ->where('nn_menu_id', $data['primaryMenuId'])
                            ->select('*')
                            ->count();
        }else{
            $data['primaryMenuId'] = 0;
            $data['totalMenuItems'] = 0;
        }

        //__ count menus area
        $data['countCollections'] = DB::table('nn_collection')->count();

        return view('nn_cms.pages.dashboard', $data);
    }
}