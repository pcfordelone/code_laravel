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
        'as' => 'categories.index',
        'uses' => 'AdminCategoriesController@index'
    ]);
    Route::get('/categories/create', [
        'as' => 'category.new',
        'uses' => 'AdminCategoriesController@create'
    ]);
    Route::post('/categories/create', [
        'as' => 'category.create',
        'uses' => 'AdminCategoriesController@store'
    ]);

    Route::get('/categories/edit/{id}', [
        'as' => 'category.edit',
        'uses' => 'AdminCategoriesController@edit'
    ]);
    Route::put('/categories/edit/{id}', [
        'as' => 'category.edit',
        'uses' => 'AdminCategoriesController@update'
    ]);

    Route::get('/categories/destroy/{id}', [
        'as' => 'category.destroy',
        'uses' => 'AdminCategoriesController@destroy'
    ]);

    /**
     * Products
     */
    Route::get('/products', [
        'as' => 'products.index',
        'uses' => 'AdminProductsController@index'
    ]);

    Route::get('/products/create', [
        'as' => 'product.new',
        'uses' => 'AdminProductsController@create'
    ]);
    Route::post('/products/create', [
        'as' => 'products.store',
        'uses' => 'AdminProductsController@store'
    ]);

    Route::get('/products/edit/{id}', [
        'as' => 'product.edit',
        'uses' => 'AdminProductsController@edit'
    ]);
    Route::put('/products/edit/{id}', [
        'as' => 'products.update',
        'uses' => 'AdminProductsController@update'
    ]);

    Route::get('/products/destroy/{id}', [
        'as' => 'product.destroy',
        'uses' => 'AdminProductsController@destroy'
    ]);

});