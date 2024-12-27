<?php

namespace App\Http\Controllers\nn_cms;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_collection;
use App\Models\nn_gallery;
use App\Models\nn_galery_lang;
use App\Models\nn_file;
use LaravelLocalization;

class ManagerGallery extends ManagerSiteController
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
    public function index($id)
    {
        $collectionId = $id;

        $data['collection'] = nn_collection::findOrFail($id);

        $data['gallery'] = nn_gallery::getGallery($collectionId);

        return view('nn_cms.pages.nn_gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['collection'] = nn_collection::findOrFail($id);

        return view('nn_cms.pages.nn_gallery.create', $data);
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
            'slug' => 'required|unique:nn_gallery',
        ]);

        $gallery = nn_gallery::createGallery($request->all());

        $insertedId = $gallery->id;

        return redirect(getCurrentLocale() . '/manager/collection/' . $request['collection_id'] . '/gallery/' . $insertedId . '/edit');
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
    public function edit($collectionId, $galleryId)
    {
        $data['collectionId'] = $collectionId;

        $data['galleryId'] = $galleryId;

        $data['gallery'] = nn_gallery::editGallery($galleryId);

        return view('nn_cms.pages.nn_gallery.edit', $data);
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

            if(nn_gallery::updateGallery($request->all())){

                $data['success'] = 1;

            }

            return $data;
        }

        return redirect(getCurrentLocale() . '/manager/collection/' . $request->collection_id . '/gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $galleryId = $request->id;

        $gallery = nn_gallery::find($galleryId);

        nn_file::deleteFromCM('gallery', $galleryId); // Delete attached files

        $gallery->delete();
    }
}
