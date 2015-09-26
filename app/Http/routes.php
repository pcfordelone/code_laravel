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

/**
 * Admin Group Route
 */
Route::group(['prefix' => 'admin'], function() {

    Route::pattern('id', '[0-9]+');

    Route::group(['prefix' => 'categories'], function()
    {
        Route::get('/', ['as' => 'categories.index', 'uses' => 'AdminCategoriesController@index']);

        Route::get('create', ['as' => 'category.new','uses' => 'AdminCategoriesController@create']);
        Route::post('create', ['as' => 'category.create','uses' => 'AdminCategoriesController@store']);

        Route::get('edit/{id}', ['as' => 'category.edit','uses' => 'AdminCategoriesController@edit']);
        Route::put('edit/{id}', ['as' => 'category.edit','uses' => 'AdminCategoriesController@update']);

        Route::get('destroy/{id}', ['as' => 'category.destroy', 'uses' => 'AdminCategoriesController@destroy']);
    });

    Route::group(['prefix' => 'products'], function()
    {
        Route::get('/', ['as' => 'products.index', 'uses' => 'AdminProductsController@index']);

        Route::get('create', ['as' => 'product.new', 'uses' => 'AdminProductsController@create']);
        Route::post('create', ['as' => 'products.store', 'uses' => 'AdminProductsController@store']);

        Route::get('edit/{id}', ['as' => 'product.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('edit/{id}', ['as' => 'products.update', 'uses' => 'AdminProductsController@update']);

        Route::get('destroy/{id}', ['as' => 'product.destroy', 'uses' => 'AdminProductsController@destroy']);
    });

});