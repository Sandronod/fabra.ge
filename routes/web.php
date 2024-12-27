<?php
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::group(['namespace' => 'nn_site'], function () {
        Route::get('', 'SiteHomePage@index');
        Route::get('erovnuli-bankis-kursi', 'SiteHomePage@bankCurrencies');
        Route::get('/currencies/{obj?}/{active?}/{date?}', 'SiteHomePage@index');
        Route::post('get-currencies-data', 'SiteHomePage@getCurrenciesData');
        Route::post('get-currencies-data-seven-days', 'SiteHomePage@getSevenDays');
        Route::post('get-currencies-data-chart-days', 'SiteHomePage@getChartDays');
        Route::post('subscribe', 'SiteController@subscribe');
        Route::get('exchange', 'CurrenciesApi@get');
        Route::post('contact/send', 'SiteContactPage@send');
        Route::get('{slug}', 'SiteDynamicRouter@routeGenerator');

    });
});
