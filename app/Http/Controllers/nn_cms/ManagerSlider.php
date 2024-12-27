<?php
namespace App\Http\Controllers\nn_cms;





use Illuminate\Http\Request;





use App\Http\Requests;


use App\Http\Controllers\Controller;


use App\Models\nn_slider;


use App\Models\nn_slider_lang;





class ManagerSlider extends ManagerSiteController


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


        $data['sliderItem'] = nn_slider::getSliderItem();





        return view('nn_cms.pages.nn_slider.index', $data);


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


        nn_slider::createSliderItem($request);





        return back();


    }





    /**


     * Change gallery position


     */


    public function updatePosition(Request $request)


    {


        $slider_p = json_decode($request->slider_p);





        nn_slider::updateSliderItemPosition($slider_p);


    }





    /**


     * Delete all gallery items


     */


    public function deleteAll(Request $request)


    {


        return nn_slider::deleteAllItems();


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


        $sliderItemId = $request->id;





        // get slider item


        $sliderItem = json_encode(nn_slider::getSliderItemBySliderId($sliderItemId));





        return $sliderItem;


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


        nn_slider::updateSliderItem($request);





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


        $sliderItemId = $request->id;


        $sliderItem = nn_slider::find($sliderItemId);


        $sliderItem->delete();


    }


}


