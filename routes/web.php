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

    Route::get('/products', 'ProductController@index')->name('all-products');

    Route::get('/create-category', 'CategoryController@create')->name('create-category');
});
