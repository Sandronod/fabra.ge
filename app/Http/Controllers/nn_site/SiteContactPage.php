<?php

namespace App\Http\Controllers\nn_site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_menu_item;
use App\Models\nn_menu_item_lang;
use App\Models\nn_site_settings;
use Validator;

class SiteContactPage extends SiteController
{
    public function __construct()
    {
        parent::__construct();
    }


    // public function index()
    // {
    //     $menuItem = nn_menu_item::where(['slug' => 'contact'])->firstOrFail();

    //     $data['item'] = nn_menu_item_lang::where(['nn_menu_item_id' => $menuItem->id, 'lang' => getCurrentLocale()])->firstOrFail();

    //     return view('nn_site.pages.contact', $data);
    // }

    /**
     * Send.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $receiverEmail = nn_site_settings::select('email')->first();

        \Mail::send('email.contact', ['request' => $request->all()], function($message) use ($request, $receiverEmail) {
            $message->to($receiverEmail->email);
            $message->subject('User message');
        });

        return redirect(url(getCurrentLocale() == 'ka' ? '' : getCurrentLocale()) . '/contact?success=1');
    }
}