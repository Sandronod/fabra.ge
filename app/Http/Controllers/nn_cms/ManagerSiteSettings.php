<?php

namespace App\Http\Controllers\nn_cms;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_site_settings;

class ManagerSiteSettings extends ManagerSiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $siteSettings = new nn_site_settings();

        $data['siteSettings'] = $siteSettings::first();

        return view('nn_cms.pages.nn_site_settings.index', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $siteSettings = new nn_site_settings();

        $siteSettingsData = $siteSettings::first();

        $data = [
            'email' => $request->get('email'),
            // 'header_logo' => $request->get('header_logo'),
            // 'footer_logo' => $request->get('footer_logo'),
            'mobile' => $request->get('mobile'),
            'phone' => $request->get('phone'),
            // 'one_time_payment_price' => (float) $request->get('one_time_payment_price'),
            // 'month_payment_price' => (float) $request->get('month_payment_price'),
            //'profile_logo' => $request->get('profile_logo'),
            // 'latitude' => $request->get('latitude'),
            // 'bank_account' => $request->get('bank_account'),
            // 'longitude' => $request->get('longitude'),
            'address_ka' => $request->get('address_ka'),
            'address_en' => $request->get('address_en'),
            'title_ka' => $request->get('title_ka'),
            'title_en' => $request->get('title_en'),
            'description_ka' => $request->get('description_ka'),
            'description_en' => $request->get('description_en'),
            'bank_currencies_title_ka' => $request->get('bank_currencies_title_ka'),
            'bank_currencies_title_en' => $request->get('bank_currencies_title_en'),
            'bank_currencies_description_ka' => $request->get('bank_currencies_description_ka'),
            'bank_currencies_description_en' => $request->get('bank_currencies_description_en'),
            'tags_head' => $request->get('tags_head'),
            'tags_body' => $request->get('tags_body'),
            /*'address_ru' => $request->get('address_ru'),
            'work_hours_ka' => $request->get('work_hours_ka'),
            'work_hours_en' => $request->get('work_hours_en'),
            'work_hours_ru' => $request->get('work_hours_ru'),
            'footer_text_ka' => $request->get('footer_text_ka'),
            'footer_text_en' => $request->get('footer_text_en'),
            'footer_text_ru' => $request->get('footer_text_ru'),*/
            'facebook' => $request->get('facebook'),
            'instagram' => $request->get('instagram'),
            // 'twitter' => $request->get('twitter'),
            'linkedin' => $request->get('linkedin'),
          // 'linkedin' => $request->get('linkedin'),
            // 'youtube' => $request->get('youtube'),
        ];

        if ($siteSettingsData) {
            $check = $siteSettings::where('id', $siteSettingsData->id)->update($data);
        } else {
            $check = $siteSettings::create($data);
        }

        // return $check ? 1 : 0;
        return redirect()->back();
    }
}
