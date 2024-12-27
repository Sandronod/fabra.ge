<?php

namespace App\Http\Controllers\nn_cms;

use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_collection;
use App\Models\nn_collection_lang;
use App\Models\nn_file;

class ManagerCollection extends ManagerSiteController
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
    public function index(Router $router)
    {
        $data['collection'] = nn_collection::getCollection();

        return view('nn_cms.pages.nn_collection.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nn_cms.pages.nn_collection.create');
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
            'type' => 'required'
        ]);

        $collection = nn_collection::createCollection($request->all());

        $insertedId = $collection->id;

        return redirect(getCurrentLocale() . '/manager/collection/' . $insertedId . '/edit');
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
    public function edit($collectionId)
    {
        $data['collectionId'] = $collectionId;

        $data['collection'] = nn_collection::editCollection($collectionId);

        return view('nn_cms.pages.nn_collection.edit', $data);
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

            return json_encode(nn_collection::updateCollection($request->all()));

            if(nn_collection::updateCollection($request->all())){

                $data['success'] = 1;

            }

            return $data;
        }

        return redirect(getCurrentLocale() . '/manager/collection');
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

        $collection = nn_collection::find($id);

        $main_id = $request->itemId; // Delete main_id

        $route_name = $request->deleteItemType; // Delete item type

        nn_file::deleteFromMainCM($main_id, $route_name); // Delete attached files

        $collection->delete();
    }
}
