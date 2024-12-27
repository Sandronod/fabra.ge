<?php

namespace App\Http\Controllers\nn_cms;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_collection;
use App\Models\nn_catalog;
use App\Models\nn_category;
use App\Models\nn_thematic_category;
use App\Models\nn_color;
use App\Models\nn_file;
use LaravelLocalization;
use App\Models\nn_nonusers;
use App\Models\nn_orders;
class ManagerOrder extends ManagerSiteController
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
        //$collectionId = 1;

      //  $data['collection'] = nn_collection::findOrFail($collectionId);

        $data['catalog'] = DB::table('nn_site_users')->orderBy('id', 'desc') ->paginate(20);

        return view('nn_cms.pages.nn_orders.index', $data);
		
		
    }

    /**
     * Display a listing of searched items.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($id, Request $request)
    {
        $collectionId = $id;

        $data['collection'] = nn_collection::findOrFail($collectionId);

        $data['catalog'] = nn_catalog::getCatalogBySearch($collectionId, $request->q);

        return view('nn_cms.pages.nn_catalog.search', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['collection'] = nn_collection::findOrFail($id);

        $data['color'] = [];

        $data['category'] = nn_category::getCategory();

        $data['thematic_category'] = nn_thematic_category::getThematicCategory();

        $data['color'] = nn_color::getColor();

        return view('nn_cms.pages.nn_catalog.create', $data);
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
            'slug' => 'required|unique:nn_catalog'
        ]);

        $catalog = nn_catalog::createCatalog($request->all());

        $insertedId = $catalog->id;

        return redirect(getCurrentLocale() . '/manager/collection/' . $request['collection_id'] . '/catalog/' . $insertedId . '/edit');
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
    public function edit($collectionId, $catalogId)
    {
        $data['collectionId'] = $collectionId;

        $data['catalogId'] = $catalogId;

        $data['catalog'] = nn_catalog::editCatalog($catalogId);

        $data['catalog'][0]->color_ids = explode(',', $data['catalog'][0]->color_ids);

        $data['category'] = nn_category::getCategory();

        $data['thematic_category'] = nn_thematic_category::getThematicCategory();

        $data['color'] = nn_color::getColor();

        return view('nn_cms.pages.nn_catalog.edit', $data);
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

            if(nn_catalog::updateCatalog($request->all())){

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
    public function destroy(Request $request, $id)
    {
        $catalogId = $request->id;

        $catalog = nn_catalog::find($catalogId);

        nn_file::deleteFromCM("catalog", $catalogId); // Delete attached files

        $catalog->delete();
    }
}
