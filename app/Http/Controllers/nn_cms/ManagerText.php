<?php

namespace App\Http\Controllers\nn_cms;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_text;
use App\Models\nn_text_lang;
use LaravelLocalization;

class ManagerText extends ManagerSiteController
{
    // Auth check
//    public function __construct()
//    {
//        parent::__construct();
//        $this->middleware('auth');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['text'] = nn_text::getText();

        return view('nn_cms.pages.nn_text.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nn_cms.pages.nn_text.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required'
        ]);

        nn_text::createText($request->all());

        return redirect(getCurrentLocale() . '/manager/text');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($text_id)
    {
        $data['text_id'] = $text_id;

        $data['text'] = nn_text::editText($text_id);

        return view('nn_cms.pages.nn_text.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax()){

            $data['success'] = 0;

            // validation
            $this->validate($request, [
                'name' => 'required',
                'body' => 'required'
            ]);

            if(nn_text::updateText($request->all())){

                $data['success'] = 1;

            }

            return $data;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;

        $text = nn_text::find($id);

        $text->delete();
    }
}
