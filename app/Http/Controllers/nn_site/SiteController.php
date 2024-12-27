<?php

namespace App\Http\Controllers\nn_site;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_menu;
use App\Models\nn_site_settings;
use View;
use LaravelLocalization;
use Session;
use App\Models\nn_site_users;
use App\Models\nn_category;
use App\Models\nn_catalog;

class SiteController extends Controller
{
    // Site __construct
    public function __construct()
    {
        // primary menu
        $data['primaryMenu'] = nn_menu::getPrimaryMenu();
        $data['footerMenu'] = nn_menu::getMenuByName('footer');
        $data['siteSettings'] = nn_site_settings::first();

        $data['lang'] = (object) json_decode(file_get_contents(base_path('public/lang/'.getCurrentLocale().'.json')), true);

        $this->middleware(function ($request, $next) {

            if (Session::get('user')) {

                $user = $this->getUser(Session::get('user')['id']);

                $data['user'] = $user;

                View::share($data);

            }

            return $next($request);
            
        });
    
        View::share($data);

        if ((\Str::contains(substr(url()->current(), 0), ['/ka']))) {
            \Redirect::to(url(''))->send();
        }
    }

    public static function getUser($userId)
    {
        $user = nn_site_users::where('id', $userId)->first();

        return $user;
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers'
        ]);

        $queryState = \DB::table('subscribers')->insert([
            'email' => $request->get('email')
        ]);

        return $queryState;
    }
}
