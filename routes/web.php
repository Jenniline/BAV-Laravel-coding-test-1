<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web']], function()  {

    Route::get('/', 'PagesController@getIndex')->name('homepage');
    Route::get('about', 'PagesController@getAbout');
    Route::get('contact', 'PagesController@getContact');
    Route::get('/categories', 'CategoryController@index')->name('all-categories');

 /**Category Routes */
    Route::get('/create-category', 'CategoryController@create')->name('create-category');
    Route::post('/store-category', 'CategoryController@store')->name('store-category');
    Route::get('/show-category/{category}', 'CategoryController@show')->name('show-category');
    Route::get('/edit-category/{category}', 'CategoryController@edit')->name('edit-category');
    Route::post('update-category/{category}', 'CategoryController@update')->name('update-category');
    Route::delete('delete-category','CategoryController@destroy')->name('delete-category');

     /**Product Routes */
    Route::get('/products', 'ProductController@index' )->name('all-products');
    Route::get('/create-product', 'ProductController@create')->name('create-product');

    

});
