<?php

// Resource routes  for price_list
Route::group(['prefix' => set_route_guard('web').'/pricelist'], function () {
    Route::resource('price_list', 'PriceListResourceController');
});

// Public  routes for price_list
Route::get('price_list/popular/{period?}', 'PriceListPublicController@popular');
Route::get('pricelists/', 'PriceListPublicController@index');
Route::get('pricelists/{slug?}', 'PriceListPublicController@show');

