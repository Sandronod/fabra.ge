<?php

LaravelLocalization::setLocale($locale = 'ka');


// Main Routes


Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::group(['namespace' => 'nn_site'], function () {
        Route::get('', 'SiteHomePage@index');
        Route::get('list/{slug?}/{category?}', 'SitePages@index');
        Route::get('products', 'SitePages@index');
        Route::get('detail/{slug}', 'SitePages@single');
        Route::get('{slug}', 'SitePages@bySlug');

    });
});
