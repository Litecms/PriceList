<?php

// Admin web routes  for pricelist
Route::group(['prefix' => trans_setlocale().'/admin/pricelist'], function () {
    Route::resource('pricelist', 'Litecms\PriceList\Http\Controllers\PriceListAdminController');
});

// Admin API routes  for pricelist
Route::group(['prefix' => trans_setlocale().'api/v1/admin/pricelist'], function () {
    Route::resource('pricelist', 'Litecms\PriceList\Http\Controllers\PriceListAdminApiController');
});

// User web routes for pricelist
Route::group(['prefix' => trans_setlocale().'/user/pricelist'], function () {
    Route::resource('pricelist', 'Litecms\PriceList\Http\Controllers\PriceListUserController');
});

// User API routes for pricelist
Route::group(['prefix' => trans_setlocale().'api/v1/user/pricelist'], function () {
    Route::resource('pricelist', 'Litecms\PriceList\Http\Controllers\PriceListUserApiController');
});

//  web routes for pricelist
Route::group(['prefix' => trans_setlocale().'/pricelists'], function () {
    Route::get('/', 'Litecms\PriceList\Http\Controllers\PriceListController@index');
    Route::get('/{slug?}', 'Litecms\PriceList\Http\Controllers\PriceListController@show');
});

//  API routes for pricelist
Route::group(['prefix' => trans_setlocale().'api/v1/pricelists'], function () {
    Route::get('/', 'Litecms\PriceList\Http\Controllers\PriceListApiController@index');
    Route::get('/{slug?}', 'Litecms\PriceList\Http\Controllers\PriceListApiController@show');
});

