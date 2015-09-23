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

    /**
     * Categories
     */
    Route::get('/categories', [
        'as' => 'categories_index',
        'uses' => 'AdminCategoriesController@index'
    ]);
    Route::post('/categories', [
        'as' => 'category_new',
        'uses' => 'AdminCategoriesController@insert'
    ]);
    Route::put('/categories/{id}', [
        'as' => 'category_update',
        'uses' => 'AdminCategoriesController@update'
    ]);
    Route::delete('/categories/{id}', [
        'as' => 'category_delete',
        'uses' => 'AdminCategoriesController@delete'
    ]);

    /**
     * Products
     */
    Route::get('/products', [
        'as' => 'products_index',
        'uses' => 'AdminProductsController@index'
    ]);
    Route::post('/products', [
        'as' => 'products_index',
        'uses' => 'AdminProductsController@insert'
    ]);
    Route::put('/products/{id}', [
        'as' => 'products_index',
        'uses' => 'AdminProductsController@update'
    ]);
    Route::delete('/products/{id}', [
        'as' => 'products_index',
        'uses' => 'AdminProductsController@delete'
    ]);

});