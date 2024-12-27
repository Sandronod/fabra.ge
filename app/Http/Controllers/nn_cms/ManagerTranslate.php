<?php





namespace App\Http\Controllers\nn_cms;



use Illuminate\Http\Request;


use App\Http\Requests;


use App\Http\Controllers\Controller;


use App\Models\nn_collection;


use App\Models\nn_translate;


use App\Models\nn_file;


use LaravelLocalization;





class ManagerTranslate extends ManagerSiteController


{



    /**


     * Display a listing of the resource.


     *


     * @return \Illuminate\Http\Response


     */


    public function index()
    {
        $data['translate'] = nn_translate::getTranslate();

        return view('nn_cms.pages.nn_translate.index', $data);
    }


    public function generateLangFiles()
    {
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {

            $translate = nn_translate::join('nn_translate_lang', 'nn_translate_lang.translate_id', '=', 'nn_translate.id')->where('lang', $localeCode)->pluck('nn_translate_lang.name', 'nn_translate.trans_key')->toJson(JSON_UNESCAPED_UNICODE);

            file_put_contents(base_path('public/lang/'.$localeCode.'.json'), $translate);
    
        }

        return redirect()->back();
    }



    /**


     * Show the form for creating a new resource.


     *


     * @return \Illuminate\Http\Response


     */


    public function create()
    {
        return view('nn_cms.pages.nn_translate.create');
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


            'trans_key' => 'required|unique:nn_translate',


            'name' => 'required',


        ]);





        $translate = nn_translate::createTranslate($request->all());





        $insertedId = $translate->id;





        return redirect(getCurrentLocale() . '/manager/translate/' . $insertedId . '/edit');


    }


    /**


     * Show the form for editing the specified resource.


     *


     * @param  int  $id


     * @return \Illuminate\Http\Response


     */


    public function edit($translateId)
    {

        $data['translateId'] = $translateId;


        $data['translate'] = nn_translate::editTranslate($translateId);


        return view('nn_cms.pages.nn_translate.edit', $data);
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
       
        if($request->ajax()){


            $data['success'] = 0;





            // validation


            $this->validate($request, [


                'name' => 'required'


            ]);





            if(nn_translate::updateTranslate($request->all())){





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
        $translateId = $request->id;

        $translate = nn_translate::find($translateId);

        $translate->delete();
    }


}


