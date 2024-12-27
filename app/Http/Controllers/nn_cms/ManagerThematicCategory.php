<?php

namespace App\Http\Controllers\nn_cms;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_collection;
use App\Models\nn_thematic_category;
use App\Models\nn_file;
use LaravelLocalization;

class ManagerThematicCategory extends ManagerSiteController
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
        $data['thematic_category'] = nn_thematic_category::getThematicCategory();

        return view('nn_cms.pages.nn_thematic_category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['thematic_category'] = nn_thematic_category::getThematicCategory();

        return view('nn_cms.pages.nn_thematic_category.create', $data);
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
            'name' => 'required'
        ]);

        $thematicCategory = nn_thematic_category::createThematicCategory($request->all());

        $insertedId = $thematicCategory->id;

        return redirect(getCurrentLocale() . '/manager/thematic_category/' . $insertedId . '/edit');
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
    public function edit($thematicCategoryId)
    {
        $data['thematic_categoryId'] = $thematicCategoryId;

        $data['thematic_category'] = nn_thematic_category::editThematicCategory($thematicCategoryId);

        return view('nn_cms.pages.nn_thematic_category.edit', $data);
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
                'name' => 'required'
            ]);

            if(nn_thematic_category::updateThematicCategory($request->all())){

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
        $thematicCategoryId = $request->id;

        $thematicCategory = nn_thematic_category::find($thematicCategoryId);

        $thematicCategory->delete();
    }
}
