<?php







namespace App\Http\Controllers\nn_cms;







use Illuminate\Http\Request;



use App\Http\Requests;

use Config;

use App\Http\Controllers\Controller;



use App\Models\nn_collection;



use App\Models\nn_catalog;



// use App\Models\nn_article;



use App\Models\nn_category;



// use App\Models\nn_thematic_category;



// use App\Models\nn_color;

use View;

use App\Models\nn_file;



use App\Models\nn_settings;


use App\Models\nn_filialebi;



use LaravelLocalization;







class ManagerCatalog extends ManagerSiteController



{



    // Auth check



   public function __construct()

   {
       
      
   }





public static function getCollTypes($from = "create")
{
    if($from == "edit"){
        $coll_id =  request()->route('cat_id');
     }else{
       $coll_id =  request()->route('id');
     }
 
     $type = nn_collection::where("id", $coll_id)->select("type")->first()->type;
     if(Config::get('collections.'.$type)){
         
         $data["typeitems"] = Config::get('collections.'.$type);

     }else{
       $data["typeitems"] = Config::get('collections.templates');
       
     }
     View::share($data);
}

    /**



     * Display a listing of the resource.



     *



     * @return \Illuminate\Http\Response



     */



    public function index(Request $request, $id)
    {
        $collectionId = $id;

        $data['collection'] = nn_collection::findOrFail($collectionId);

        $data['items'] = nn_catalog::where(['nn_catalog_lang.lang' => getCurrentLocale(), 'collection_id' => $collectionId])
        ->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')
        ->join('nn_collection', 'nn_catalog.collection_id', '=', 'nn_collection.id')
        ->select('nn_catalog.id', 'nn_catalog.show', 'nn_catalog.category_id', 'nn_catalog.aqcia_id', 'nn_catalog_lang.name', 'nn_catalog_lang.body', 'nn_catalog_lang.description', 'nn_catalog_lang.imgurl', 'nn_catalog.show_home', 'nn_collection.type')
        ->orderBy('nn_catalog.position', 'desc')
        ->orderBy('nn_catalog.views', 'desc')
        ->paginate(20);

        if ($request->ajax()) {

            $view = view('nn_cms.pages.nn_catalog.catalog_items', $data);

            return response()->json(['view' => $view->render(), 'isMore' => $data['items']->hasMorePages()]);

        }

        return view('nn_cms.pages.nn_catalog.index', $data);
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







        $data['catalog'] = nn_catalog::getCatalogBySearch($collectionId, $request->q,  $request->cat);







        return view('nn_cms.pages.nn_catalog.search', $data);



    }







    /**



     * Show the form for creating a new resource.



     *



     * @return \Illuminate\Http\Response



     */



    public function create($id)
    {
        self::getCollTypes();


        $data['collection'] = nn_collection::findOrFail($id);


        // $data['color'] = [];



        $data['category'] = nn_category::getCategory();



        // $data['thematic_category'] = nn_thematic_category::getThematicCategory();



        // $data['color'] = nn_color::getColor();



        // $data['Aqcia'] = nn_article::getCatalogForEdit();



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

    self::getCollTypes("edit");

        $data['collectionId'] = $collectionId;







        $data['catalogId'] = $catalogId;







        $data['catalog'] = nn_catalog::editCatalog($catalogId);







     //   $data['catalog'][0]->color_ids = explode(',', $data['catalog'][0]->color_ids);







        $data['category'] = nn_category::getCategory();







        // $data['thematic_category'] = nn_thematic_category::getThematicCategory();







        // $data['color'] = nn_color::getColor();





		// $data['Aqcia'] = nn_article::getCatalogForEdit();

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

  public function settings(Request $request)



    {

		$sett=nn_settings::SaveSettings($request->all());

		return $sett;

		

	}

	  public function filials(Request $request)



    {

		$sett=nn_filialebi::SaveSettings($request->all());

		return $sett;

		

	}

    public function destroy(Request $request, $id)



    {



        $catalogId = $request->id;







        $catalog = nn_catalog::find($catalogId);







        nn_file::deleteFromCM("catalog", $catalogId); // Delete attached files







        $catalog->delete();



    }

    public function showHideToggle(Request $request)
    {
        $catalog = nn_catalog::where('id', $request->catalogId)->first();

        $catalog->show = $catalog->show == 1 ? 0 : 1;

        $catalog->save();
    }

    public function showHideToggleHome(Request $request)
    {
        $catalog = nn_catalog::where('id', $request->catalogId)->first();

        $catalog->show_home = $catalog->show_home == 1 ? 0 : 1;

        $catalog->save();
    }

    public function changePositions(Request $request)
    {
        $catalogIds = reverseArrayKeys($request->catalogIds);

        foreach ($catalogIds as $position => $id) {

            $catalog = nn_catalog::where('id', $id)->first();
    
            $catalog->position = $position;
    
            $catalog->save();

        }
    }

}



