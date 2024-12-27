<?php

namespace App\Http\Controllers\nn_cms;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_gallery;
use App\Models\nn_gallery_item;
use App\Models\nn_gallery_item_lang;
use Intervention\Image\Facades\Image;
use File;
use LaravelLocalization;

class ManagerGalleryItem extends ManagerSiteController
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
    public function index($collectionId, $galleryId)
    {
        $data['collectionId'] = $collectionId;

        $data['gallery'] = nn_gallery::findOrFail($galleryId);

        $data['galleryItem'] = nn_gallery_item::getGalleryItem($galleryId);

        return view('nn_cms.pages.nn_gallery_item.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        nn_gallery_item::createGalleryItem($request);

        return back();
    }

    /**
     * Change gallery position
     */
    public function updatePosition(Request $request)
    {
        $gallery_p = json_decode($request->gallery_p);

        nn_gallery_item::updateGalleryItemPosition($gallery_p);
    }

    /**
     * Delete all gallery items
     */
    public function deleteAll(Request $request)
    {
        return nn_gallery_item::deleteAllItems($request->gallery_id);
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
    public function edit(Request $request)
    {
        $galleryItemId = $request->id;

        // get galleryItem
        $galleryItem = json_encode(nn_gallery_item::getGalleryItemByGalleryItemId($galleryItemId));

        return $galleryItem;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        nn_gallery_item::updateGalleryItem($request);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $galleryItemId = $request->id;
        $galleryItem = nn_gallery_item::find($galleryItemId);
        $galleryItem->delete();
    }
}
