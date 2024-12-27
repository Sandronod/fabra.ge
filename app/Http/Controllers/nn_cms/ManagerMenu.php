<?php



namespace App\Http\Controllers\nn_cms;



use Illuminate\Routing\Router;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Models\nn_collection;

use App\Models\nn_menu;

use App\Models\nn_menu_item;

use App\Models\nn_menu_item_lang;

use App\Models\nn_file;

use LaravelLocalization;



class ManagerMenu extends ManagerSiteController

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

        $data['menu'] = nn_menu::all();



        return view('nn_cms.pages.nn_menu.index', $data);

    }



    /**

     * Set primary menu.

     */

    public function setPrimary(Request $request)

    {

        $id = $request->id;



        $menu = new nn_menu;

        $menu->query()->update(array('primary' => 0));

        $menu->where('id', $id)->update(['primary' => 1]);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('nn_cms.pages.nn_menu.create');

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

        

        $menu = new nn_menu;

        // set primary menu if it doesn't exist START

        $checkPrimary = $menu::where('primary', 1)

                    ->count();

        $menu->primary = ($checkPrimary) ? 0 : 1;

        // set primary menu if it doesn't exist END

        $menu->name = $request->name;

        $menu->save();



        return redirect(getCurrentLocale() . '/manager/menu');

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

    public function edit($id)

    {

        $data['menu'] = nn_menu::find($id);



        return view('nn_cms.pages.nn_menu.edit', $data);

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

        $menu = nn_menu::find($request->id);

        $menu->name = $request->name;

        $menu->save();



        return redirect(getCurrentLocale() . '/manager/menu');

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

        $menu = nn_menu::find($id);

        $main_id = $request->itemId; // Delete main_id

        $route_name = $request->deleteItemType; // Delete item type

        nn_file::deleteFromMainCM($main_id, $route_name); // Delete attached files

        $menu->nn_menu_items()->delete();

        $menu->delete();

    }



    public function items($id)

    {

        return view('nn_cms.pages.nn_menu.menuitem');

    }



    public function createItem()

    {

        $data['collections'] = nn_collection::all();



        return view('nn_cms.pages.nn_menuitems.create', $data);

    }

}

