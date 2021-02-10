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

Route::get('/', 'PagesController@getIndex')->name('homepage');


//Authentication routes
Route::group([
        'prefix'=>'auth',
],
    function(){
    /**Registration Routes */
    Route::get('user-registration', 'UserController@index')->name('user-registration-form');
    Route::post('user-store', 'UserController@userPostRegistration')->name('user-registratio-store');
    /**Login Routes */
    Route::get('user-login', 'UserController@userLoginIndex')->name('user-login-form');
    Route::post('login', 'UserController@userPostLogin')->name('user-login-store');

    /**Logout Routes */
    Route::get('logout', 'UserController@logout')->name('user-logout');

    }
);

Route::group(['middleware' => ['web']], function()  {

    // Route::get('/login', 'MainController@index')->name('login-form');

/**Authentication Routes */

    /**Registration Routes */
    // Route::get('user-registration', 'UserController@index')->name('user-registration-form');
    // Route::post('user-store', 'UserController@userPostRegistration')->name('user-registratio-store');
    /**Login Routes */
    // Route::get('user-login', 'UserController@userLoginIndex')->name('user-login-form');
    // Route::post('login', 'UserController@userPostLogin')->name('user-login-store');

    /**Logout Routes */
    // Route::get('logout', 'UserController@logout')->name('user-logout');

/**Pages on the NavBar Routes */
    Route::get('welcome', 'PagesController@getWelcome')->name('welcome');
    Route::get('about', 'PagesController@getAbout');
    Route::get('contact', 'PagesController@getContact');
    Route::get('/categories', 'CategoryController@index')->name('all-categories');
    // Route::get('/', 'PagesController@getIndex')->name('homepage');

        

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
    Route::post('/store-product', 'ProductController@store')->name('store-product');
    Route::get('/show-product/{product}', 'ProductController@show')->name('show-product');
    Route::get('/edit-product/{product}', 'ProductController@edit')->name('edit-product');
    Route::post('update-product/{product}', 'ProductController@update')->name('update-product');
    Route::delete('delete-product','ProductController@destroy')->name('delete-product');

});
