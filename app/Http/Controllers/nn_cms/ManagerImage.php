<?php

namespace App\Http\Controllers\nn_cms;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_image;

class ManagerImage extends ManagerSiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type, $main_id, $route_name, $route_id)
    {
        $data['type'] = $type;

        $data['main_id'] = $main_id;

        $data['route_name'] = $route_name;

        $data['route_id'] = $route_id;

        $data['imageItem'] = nn_image::getImage($route_name, $route_id);

        return view('nn_cms.pages.nn_image.index', $data);
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
        nn_image::createImage($request);

        return back();
    }

    /**
     * Change file position
     */
    public function updatePosition(Request $request)
    {
        $image_p = json_decode($request->image_p);

        nn_image::updateImagePosition($image_p);
    }

    /**
     * Delete all gallery items
     */
    public function deleteAll(Request $request)
    {
        return nn_image::deleteAllImages($request->route_name, $request->route_id);
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
        $image_id = $request->id;

        // get item
        $image = json_encode(nn_image::getImageByImageId($image_id));

        return $image;
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
        nn_image::updateImage($request);

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
        $image_id = $request->id;

        $image = nn_image::find($image_id);

        $image->delete();
    }
}
