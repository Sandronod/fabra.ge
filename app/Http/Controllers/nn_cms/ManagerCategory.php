<?php



namespace App\Http\Controllers\nn_cms;



use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Models\nn_collection;

use App\Models\nn_category;

use App\Models\nn_file;

use LaravelLocalization;



class ManagerCategory extends ManagerSiteController

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

    public function index(Request $request)
    {

        $data['items'] = nn_category::where(['nn_category_lang.lang' => getCurrentLocale()])
                            ->join('nn_category_lang', 'nn_category.id', '=', 'nn_category_lang.category_id')
                            ->select('nn_category.id', 'nn_category.position', 'nn_category.show', 'nn_category.parent_id', 'nn_category_lang.name', 'nn_category_lang.imgurl', 'nn_category_lang.description')
                            ->orderBy('nn_category.position', 'desc')
                            ->orderBy('nn_category.created_at', 'desc')
                            ->paginate(20);

        if ($request->ajax()) {

            $view = view('nn_cms.pages.nn_category.category_items', $data);

            return response()->json(['view' => $view->render(), 'isMore' => $data['items']->hasMorePages()]);

        }

        return view('nn_cms.pages.nn_category.index', $data);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $data['category'] = nn_category::getCategory();



        return view('nn_cms.pages.nn_category.create', $data);

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



        $category = nn_category::createCategory($request->all());



        $insertedId = $category->id;



        return redirect(getCurrentLocale() . '/manager/category/' . $insertedId . '/edit');

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

    public function edit($categoryId)

    {

        $data['categoryId'] = $categoryId;



        $data['category'] = nn_category::editCategory($categoryId);



        $data['parentCategory'] = nn_category::getParentCategory($categoryId, $data['category'][0]->parent_id);

		

        return view('nn_cms.pages.nn_category.edit', $data);

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

        if($request->ajax()) {


            $data['success'] = 0;



            // validation

            $this->validate($request, [

                'name' => 'required'

            ]);



            if(nn_category::updateCategory($request->all())){



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

        $categoryId = $request->id;



        $category = nn_category::find($categoryId);



        $category->delete();

    }

    public function showHideToggle(Request $request)
    {
        $category = nn_category::where('id', $request->categoryId)->first();

        $category->show = $category->show == 1 ? 0 : 1;

        $category->save();
    }

    public function changePositions(Request $request)
    {
        $categoryIds = reverseArrayKeys($request->categoryIds);

        foreach ($categoryIds as $position => $id) {

            $category = nn_category::where('id', $id)->first();
    
            $category->position = $position;
    
            $category->save();

        }
    }

}

