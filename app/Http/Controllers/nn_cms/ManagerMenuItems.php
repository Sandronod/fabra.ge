<?php



namespace App\Http\Controllers\nn_cms;



use DB;

use Illuminate\Routing\Router;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Http\Controllers\nn_cms\ManagerMenuClass;

use App\Models\nn_collection;

use App\Models\nn_collection_lang;

use App\Models\nn_menu;

use App\Models\nn_menu_item;

use App\Models\nn_menu_item_lang;

use LaravelLocalization;

use Cocur\Slugify\Slugify;



class ManagerMenuItems extends ManagerSiteController

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

    public function index(Router $router, $id)

    {

        $data['id'] = $id;



        // get menu Primary value

        $menu = new nn_menu;

        $data['primary'] = $menu->find($id)->primary;



        // get menu items

        $menuClass = new ManagerMenuClass;

        $data['allitems'] = $menuClass->getallitems($id);



        return view('nn_cms.pages.nn_menu.menuitem', $data);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create($id)

    {

        $collections = nn_collection_lang::where('lang', getCurrentLocale())->get();



        return view('nn_cms.pages.nn_menuitems.create', compact('collections', 'id'));

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {
		

        // supported locales string

        $supportedLocalesCodesString = implode(',', getSupportedLocalesCodes());



        // validation

        if($request->type == 'text' || $request->type == 'collection'){ // check if type is: text or collection

            $this->validate($request, [

                'name' => 'required',

                'slug' => 'required|unique:nn_menu_item|not_in:!admin,manager,img,' . $supportedLocalesCodesString

            ]);

        }else if($request->type == 'link'){ // check if type is: link

            $this->validate($request, [

                'name' => 'required'

            ]);

        }



        // make slug using slugify package

        if($request->type == 'text' || $request->type == 'collection'){ // check if type is: text or collection
 $vv= @new Slugify();

            $request->slug = $vv->slugify($request->slug, '-');
		//	dd($supportedLocalesCodesString);

        }



        $item = new nn_menu_item;

        $item->slug = $request->slug;

        $item->type = $request->type;

        $item->collection_id = $request->collection_id;

        $item->nn_menu_id = $request->menu_id;

        $item->parent_id = $request->parent_id; 

        $item->save();



        $itemid = $item->id;

        $i = '';



        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){

            $i .= $localeCode . '--';

            $itemlang = new nn_menu_item_lang;

            $itemlang->nn_menu_item_id = $itemid;

            $itemlang->lang = $localeCode;

            $itemlang->name = $request->name;

            if($request->type == 'text' || $request->type == 'collection'){ // check if type is: text or collection

                $itemlang->link = '';

                $itemlang->body = $request->body;

                $itemlang->imgurl = $request->imgurl;

            }else if($request->type == 'link'){ // check if type is: link

                $itemlang->link = $request->link;

            }

            $itemlang->description = $request->description;

            $itemlang->save();

        }



        return redirect(getCurrentLocale() . '/manager/menu/' . $item->nn_menu_id . '/items/' . $itemid . '/edit/');

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

    public function edit($id, $item_id)

    {

        $data['id'] = $id;



        $data['item_id'] = $item_id;



        $data['itemArr'] = array();



        $data['menuitems'] = DB::table('nn_menu_item_lang')->where('nn_menu_item_id', '=', $item_id)->get();



        $data['collections'] = nn_collection_lang::where('lang', getCurrentLocale())->get();



        $mitem = DB::table('nn_menu_item')->where('id', '=', $item_id)->get();



        $data['type'] = $mitem[0]->type;



        foreach($mitem as $mitems){



            $data['collection_id'] = $mitems->collection_id;



        }

   

        foreach($data['menuitems'] as $menuitem){



            $data['itemArr'][$menuitem->lang] = $menuitem;



        }



        return view('nn_cms.pages.nn_menuitems.edit', $data);

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id, $item_id)

    {

        // validation

        if($request->type == 'text' || $request->type == 'collection'){ // check if type is: text or collection

            $this->validate($request, [

                'name' => 'required'

            ]);

        }else if($request->type == 'link'){ // check if type is: link

            $this->validate($request, [

                'name' => 'required'

            ]);

        }

        

        // update nn_menu_item

        $menuitem = nn_menu_item::find($request->menu_item_id);

        $menuitem->type = $request->type;

        $menuitem->collection_id = $request->collection_id;

        $menuitem->save();



        // update nn_menu_item_lang

        $menuitemLang = nn_menu_item_lang::find($request->menu_item_id_lang);

        $menuitemLang->name = $request->name;

        if($request->type == 'text' || $request->type == 'collection' || $request->type == 'contact'){ // check if type is: text or collection

            $menuitemLang->link = '';

            $menuitemLang->body = $request->body;

            $menuitemLang->description = $request->description;

            $menuitemLang->imgurl = $request->imgurl;

        }else if($request->type == 'link'){ // check if type is: link

            $menuitemLang->link = $request->link;

            $menuitemLang->body = '';

            $menuitemLang->description = '';

            $menuitemLang->imgurl = '';

        }

        $menuitemLang->description = $request->description;

        $menuitemLang->save();

 

        return 'ok';

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($item_id)

    {

        $menuitem = nn_menu_item::find($item_id);



        $menuitem->delete();



        return back();

    }

}

