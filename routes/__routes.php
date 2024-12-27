<?php


/*



|--------------------------------------------------------------------------



| Application Routes



|--------------------------------------------------------------------------



|



| Here is where you can register all of the routes for an application.



| It's a breeze. Simply tell Laravel the URIs it should respond to



| and give it the controller to call when that URI is requested.



|



*/







// Home Manul



//Route::get('/', function() {



//   return 'Home Manul';



//});







// Intervention\Image



Route::get('media', [ 'as' => 'image.create', 'uses' => 'ImageController@create']);



Route::post('media', [ 'as' => 'image.store', 'uses' => 'ImageController@save']);



Route::get('media/show', [ 'as' => 'image.resized', 'uses' => 'ImageController@show']);







// Glide



Route::get('img/photos/{num}/{folder}/{path}', function (League\Glide\Server $server, Illuminate\Http\Request $request) {



	$server->outputImage($request->path(), $request->all());



});



Route::get('img/photos/{num}/{path}', function (League\Glide\Server $server, Illuminate\Http\Request $request) {



	$server->outputImage($request->path(), $request->all());



});







// Set Default language



LaravelLocalization::setLocale($locale = 'ka');







// Main Routes



Route::group(['prefix' => LaravelLocalization::setLocale()], function() {







	// Auth routes



    Route::get('!admin', function() {



        return redirect('!admin/login');



    });



	Route::group(['prefix' => '!admin', 'namespace' => 'Auth'], function() {



		// Registration routes...



//		 Route::get('register', 'AuthController@getRegister');



//		 Route::post('register', 'AuthController@postRegister');







		// Authentication routes...



		Route::get('login', 'AuthController@getLogin');



		Route::post('login', 'AuthController@postLogin');



		Route::get('logout', 'AuthController@getLogout');



	});







	// Manager routes



	Route::group(['namespace' => 'nn_cms', 'middleware' => 'auth'], function() {



		//__Dashboard



		Route::get('manager', 'ManagerDashboard@index');



		//__User Profile



		Route::group(['prefix' => 'manager/user/profile'], function() {



			Route::get('/', 'ManagerProfileEdit@index');



			Route::get('photo', 'ManagerProfileEdit@photo');



			Route::get('password', 'ManagerProfileEdit@password');



			Route::patch('{id}/update/info', 'ManagerProfileEdit@update_info');



			Route::patch('{id}/update/info_mail', 'ManagerProfileEdit@update_info_mail');



			Route::patch('{id}/update/photo', 'ManagerProfileEdit@update_photo');



			Route::patch('{id}/update/pass', 'ManagerProfileEdit@update_pass');



		});



		//__Collection



		Route::group(['prefix' => 'manager/collection'], function() {



			Route::get('/', 'ManagerCollection@index');



			Route::get('create', 'ManagerCollection@create');



			Route::get('{id}/edit', 'ManagerCollection@edit');



			Route::patch('{id}/update', 'ManagerCollection@update');



			Route::post('store', 'ManagerCollection@store');



			Route::post('destroy', 'ManagerCollection@destroy');



		});



        //__Category



        Route::group(['prefix' => 'manager/category'], function() {



            Route::get('/', 'ManagerCategory@index');



            Route::get('create', 'ManagerCategory@create');



            Route::get('{id}/edit', 'ManagerCategory@edit');



            Route::patch('{id}/update', 'ManagerCategory@update');



            Route::post('store', 'ManagerCategory@store');



            Route::post('destroy', 'ManagerCategory@destroy');



        });



        //__Thematic Category



        Route::group(['prefix' => 'manager/thematic_category'], function() {



            Route::get('/', 'ManagerThematicCategory@index');



            Route::get('create', 'ManagerThematicCategory@create');



            Route::get('{id}/edit', 'ManagerThematicCategory@edit');



            Route::patch('{id}/update', 'ManagerThematicCategory@update');



            Route::post('store', 'ManagerThematicCategory@store');



            Route::post('destroy', 'ManagerThematicCategory@destroy');



        });



        //__Thematic Category



        Route::group(['prefix' => 'manager/color'], function() {



            Route::get('/', 'ManagerColor@index');



            Route::get('create', 'ManagerColor@create');



            Route::get('{id}/edit', 'ManagerColor@edit');



            Route::patch('{id}/update', 'ManagerColor@update');



            Route::post('store', 'ManagerColor@store');



            Route::post('destroy', 'ManagerColor@destroy');



        });



		//__Global --> Attach files



		Route::group(['prefix' => 'manager/{type}/{type_id}/{route_name}/{route_id}/file'], function() {



			Route::get('/', 'ManagerFile@index');



			Route::post('store', 'ManagerFile@store');



			Route::post('updateposition', 'ManagerFile@updatePosition');



			Route::post('deleteall', 'ManagerFile@deleteAll');



			Route::post('edit', 'ManagerFile@edit');



			Route::post('update', 'ManagerFile@update');



			Route::post('destroy', 'ManagerFile@destroy');



		});



        //__Global --> Attach Images



        Route::group(['prefix' => 'manager/{type}/{type_id}/{route_name}/{route_id}/image'], function() {



            Route::get('/', 'ManagerImage@index');



            Route::post('store', 'ManagerImage@store');



            Route::post('updateposition', 'ManagerImage@updatePosition');



            Route::post('deleteall', 'ManagerImage@deleteAll');



            Route::post('edit', 'ManagerImage@edit');



            Route::post('update', 'ManagerImage@update');



            Route::post('destroy', 'ManagerImage@destroy');



        });



		//__Collection -->



		Route::group(['prefix' => 'manager/collection'], function() {



			//____Article



			Route::get('{id}/article', 'ManagerArticle@index');



			Route::get('{id}/article/create', 'ManagerArticle@create');



			Route::get('{cat_id}/article/{id}/edit', 'ManagerArticle@edit');



			Route::patch('{id}/article/update', 'ManagerArticle@update');



			Route::post('article/store', 'ManagerArticle@store');



			Route::post('{id}/article/destroy', 'ManagerArticle@destroy');

			

			



			//____Catalog

			 

			Route::patch('catalog/settings', 'ManagerCatalog@settings');

			

			Route::patch('catalog/filials', 'ManagerCatalog@filials');

			

			Route::get('{id}/catalog', 'ManagerCatalog@index');



			Route::get('{id}/catalog/search', 'ManagerCatalog@search');



			Route::get('{id}/catalog/create', 'ManagerCatalog@create');



			Route::get('{cat_id}/catalog/{id}/edit', 'ManagerCatalog@edit');



			Route::patch('{id}/catalog/update', 'ManagerCatalog@update');



			Route::post('catalog/store', 'ManagerCatalog@store');



			Route::post('{id}/catalog/destroy', 'ManagerCatalog@destroy');



			//____Gallery



			Route::get('{id}/gallery', 'ManagerGallery@index');



			Route::get('{id}/gallery/create', 'ManagerGallery@create');



			Route::get('{cat_id}/gallery/{id}/edit', 'ManagerGallery@edit');



			Route::patch('{id}/gallery/update', 'ManagerGallery@update');



			Route::post('gallery/store', 'ManagerGallery@store');



			Route::post('{id}/gallery/destroy', 'ManagerGallery@destroy');



		    Route::get('{cat_id}/gallery/{gallery_id}/items', 'ManagerGalleryItem@index');



			Route::post('gallery/items/store', 'ManagerGalleryItem@store');



			Route::post('{cat_id}/gallery/{gallery_id}/items/updateposition', 'ManagerGalleryItem@updatePosition');



			Route::post('{cat_id}/gallery/{gallery_id}/items/deleteall', 'ManagerGalleryItem@deleteAll');



			Route::post('{cat_id}/gallery/{gallery_id}/items/edit', 'ManagerGalleryItem@edit');



			Route::post('gallery/items/update', 'ManagerGalleryItem@update');



			Route::post('{cat_id}/gallery/{gallery_id}/items/destroy', 'ManagerGalleryItem@destroy');



		});

		//_____orders

			Route::get('manager/orders', 'ManagerOrder@index');



		//__slider



		Route::get('manager/slider', 'ManagerSlider@index');



		Route::post('manager/slider/store', 'ManagerSlider@store');



		Route::post('manager/slider/updateposition', 'ManagerSlider@updatePosition');



		Route::post('manager/slider/deleteall', 'ManagerSlider@deleteAll');



		Route::post('manager/slider/edit', 'ManagerSlider@edit');



		Route::post('manager/slider/update', 'ManagerSlider@update');



		Route::post('manager/slider/destroy', 'ManagerSlider@destroy');



		//__filemanager



		Route::get('manager/filemanager', 'ManagerFileManager@index');



		//__menu



		Route::group(['prefix' => 'manager/menu'], function() {



			Route::get('/', 'ManagerMenu@index');



			Route::post('setprimary', 'ManagerMenu@setPrimary');



			Route::get('create', 'ManagerMenu@create');



			Route::post('menuclass', 'ManagerMenu@create');



			Route::post('store', 'ManagerMenu@store');



			Route::post('destroy', 'ManagerMenu@destroy');



			Route::get('{id}/edit', 'ManagerMenu@edit');



			Route::patch('update', 'ManagerMenu@update');



			//____items



			Route::get('{id}/items', 'ManagerMenuItems@index');



			Route::get('{id}/items/create', 'ManagerMenuItems@create');



			Route::post('{id}/items/store', 'ManagerMenuItems@store');



			Route::post('{id}/saveitemorders', 'ManagerMenuClass@saveitemorders');



			Route::get('{id}/items/{item_id}/edit', 'ManagerMenuItems@edit');



			Route::get('{id}/items/{item_id}/destroy', 'ManagerMenuItems@destroy');



			Route::patch('{id}/items/{item_id}/update', 'ManagerMenuItems@update');



		});



	});







	// Site routes
    Route::group(['namespace' => 'nn_site'], function() {
		
    	Route::get('', 'SiteHomePage@index');
		Route::get('chvens-shesakheb', 'SiteAboutPage@index');
		Route::get('blog', 'SiteBlogPage@index');
		Route::get('forumi', 'SiteForumPage@index');
		Route::get('kontaqti', 'SiteAboutPage@contact');
		Route::get('bookonline/{id}', 'SiteSinglePage@readonline');
		// By: qochi
		Route::get('forumi/damateba', 'SiteForumPage@addPost');
		Route::get('forumi/edit/{fid}', 'SiteForumPage@addPost');
		Route::get('forumi/{fid}', 'SiteForumPage@singleForum');
		Route::get('forumi/delete/{fid}', 'SiteForumPage@deleteForum');
		Route::get('forumi/deletecomment/{fid}', 'SiteForumPage@deletecomment');
		
		
		Route::get('news', 'SiteBlogPage@news');
		Route::get('news/{age}', 'SiteBlogPage@news');
		Route::get('nakhe-da-moismine/kodeqsi', 'SiteBlogPage@kodeqsi');
		Route::get('nakhe-da-moismine/kodeqsi/{age}', 'SiteBlogPage@kodeqsi');
		Route::get('nakhe-da-moismine/konventsia', 'SiteBlogPage@konventsia');
		Route::get('nakhe-da-moismine/konventsia/{age}', 'SiteBlogPage@konventsia');
		Route::get('nakhe-da-moismine', 'SiteLibraryPage@index');
		Route::get('post/{nav}/{slug}', 'SiteSinglePage@index');
		Route::get('nakhe-da-moismine/zhurnalebi', 'SiteBlogPage@jurnal');
		Route::get('nakhe-da-moismine/zhurnalebi/{age}', 'SiteBlogPage@jurnal');		
		Route::get('nakhe-da-moismine/podkastebi', 'SiteBlogPage@podkastebi');		
		Route::get('nakhe-da-moismine/gazetebi', 'SiteBlogPage@gazetebi');
		Route::get('nakhe-da-moismine/gazetebi/{age}', 'SiteBlogPage@gazetebi');		
		Route::get('nakhe-da-moismine/filmebi', 'SiteBlogPage@filmebi');
		Route::get('nakhe-da-moismine/filmebi/{age}', 'SiteBlogPage@filmebi');		
		Route::get('nakhe-da-moismine/video', 'SiteBlogPage@video');
		Route::get('nakhe-da-moismine/video/{age}', 'SiteBlogPage@video');
		Route::get('nakhe-da-moismine/leqsikoni', 'SiteDictionaryPage@index');
		Route::get('profile/forum/{page}', 'SiteForumPage@myForum')->where(['page' => '[0-9]+']);
		Route::get('profile/edit', 'SiteForumPage@edit');
		
		Route::get('register/success', function(){
			return view('nn_site.pages.regsucssess');
		});
		Route::get('signout', 'UserRegister@signout');
		
		Route::get('search/{qstring}', 'SiteBlogPage@search');
		Route::get('search/{qstring}/{age}', 'SiteBlogPage@search');
		Route::get('search/{qstring}/{age}/{page}', 'SiteBlogPage@search');
	
		
		//post
		Route::post('user/register', 'UserRegister@register');
		Route::post('user/signin', 'UserRegister@signin');
		Route::post('user/userupdate', 'UserRegister@userupdate');
		Route::post('forum/addforum', 'SiteForumPage@addPostSave');
		Route::post('forum/edit/{fid}', 'SiteForumPage@addPostUpdate');
		Route::post('forum/addcomment', 'SiteForumPage@addCommentSave');

	});
	




});