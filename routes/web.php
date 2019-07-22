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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'login', 'middleware' => 'CheckLoged'], function () {
        Route::get('/', 'LoginController@getLogin');
        Route::post('/', 'LoginController@postLogin');
    });
    Route::get('logout', 'HomeController@getLogout');
    Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogOut'], function () {
        Route::get('home', 'HomeController@getHome');
        Route::group(['prefix' => 'category'], function () {
            Route::post('/', 'CategoryController@postCate');
            Route::get('/', 'CategoryController@getCate');
            Route::get('edit/{id}', 'CategoryController@getEdit');
            Route::post('edit/{id}', 'CategoryController@postEdit');
            Route::get('delete/{id}', 'CategoryController@getDelete');
        });
        Route::group(['prefix' => 'product'], function () {
            Route::get('/', 'ProductController@getProduct');

            Route::get('add', 'ProductController@getAddProduct');
            Route::post('add', 'ProductController@postAddProduct');

            Route::get('edit/{id}', 'ProductController@getEditProduct');
            Route::post('edit/{id}', 'ProductController@postEditProduct');

            Route::get('delete/{id}', 'ProductController@getDeleteProduct');
        });
    });
});
