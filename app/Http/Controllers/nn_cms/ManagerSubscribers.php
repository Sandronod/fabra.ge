<?php

namespace App\Http\Controllers\nn_cms;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Exports\SubscribersExport;

class ManagerSubscribers extends ManagerSiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data['subscribers'] = \DB::table('subscribers')->orderBy('id', 'desc')->get();

        return view('nn_cms.pages.nn_subscribers.index', $data);
    }

    public function download()
    {
        return \Excel::download(new SubscribersExport, 'subscribers.xlsx');
    }
}
