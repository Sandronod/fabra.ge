<?php

namespace App\Http\Controllers\nn_cms;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Hash;
use Validator;
use Auth;

class ManagerProfileEdit extends ManagerSiteController
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
        $user_id = Auth::user()->id;

        $data['users'] = Users::findOrFail($user_id);

        return view('nn_cms.pages.nn_profile.info', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function photo(Request $request)
    {
        $user_id = Auth::user()->id;

        $data['users'] = Users::findOrFail($user_id);

        return view('nn_cms.pages.nn_profile.photo', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        $user_id = Auth::user()->id;

        $data['users'] = Users::findOrFail($user_id);

        return view('nn_cms.pages.nn_profile.password', $data);
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage. Update Info
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_info(Request $request)
    {
        $users = Users::findOrFail($request->id);

        // validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname' => 'min:2'
        ]);

        if($validator->fails()){
            return redirect(getCurrentLocale() . '/manager/user/profile')->withErrors($validator->errors());
        }else{
            $users->update($request->all());

            return redirect(getCurrentLocale() . '/manager/user/profile')->with('status', 'success');
        }
    }

    /**
     * Update the specified resource in storage. Update Info
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_info_mail(Request $request)
    {
        $users = Users::findOrFail($request->id);

        // validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email|email',
        ]);

        if($validator->fails()){
            return redirect(getCurrentLocale() . '/manager/user/profile')->withErrors($validator->errors());
        }else{
            $users->update($request->all());

            return redirect(getCurrentLocale() . '/manager/user/profile')->with('status', 'success');
        }
    }

    /**
     * Update the specified resource in storage. Update Info
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_photo(Request $request, $id)
    {
        $users = Users::findOrFail($id);

        $users->update($request->all());

        return redirect(getCurrentLocale() . '/manager/user/profile/photo')->with('status', 'success');
    }

    /**
     * Update the specified resource in storage. Update Password
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_pass(Request $request, $id)
    {
        $users = Users::findOrFail($id);

        // validation
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        if(!(Hash::check($request['current_password'], $users->password))){

            $validator->errors()->add('current_password_match', trans('validation.current_password_match'));

            return redirect(getCurrentLocale() . '/manager/user/profile/password')->withErrors($validator->errors());

        }else if($validator->fails()){

            return redirect(getCurrentLocale() . '/manager/user/profile/password')->withErrors($validator->errors());

        }else{

            $users->fill([
                'password' => Hash::make($request['password'])
            ])->save();

            return redirect(getCurrentLocale() . '/manager/user/profile/password')->with('status', 'success');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
