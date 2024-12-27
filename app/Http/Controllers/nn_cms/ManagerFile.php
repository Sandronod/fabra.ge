<?php

namespace App\Http\Controllers\nn_cms;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_file;

class ManagerFile extends ManagerSiteController
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

        $data['fileItem'] = nn_file::getFile($route_name, $route_id);

        return view('nn_cms.pages.nn_file.index', $data);
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
        nn_file::createFile($request);

        return back();
    }

    /**
     * Change file position
     */
    public function updatePosition(Request $request)
    {
        $file_p = json_decode($request->file_p);

        nn_file::updateFilePosition($file_p);
    }

    /**
     * Delete all gallery items
     */
    public function deleteAll(Request $request)
    {
        return nn_file::deleteAllFiles($request->route_name, $request->route_id);
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
        $file_id = $request->id;

        // get item
        $file = json_encode(nn_file::getFileByFileId($file_id));

        return $file;
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
        nn_file::updateFile($request);

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
        $file_id = $request->id;

        $file = nn_file::find($file_id);

        $file->delete();
    }
}
