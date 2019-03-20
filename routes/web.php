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

Auth::routes();
Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/create','PostController@create')->name('admin.post.create');
        Route::post('/create','PostController@store')->name('admin.post.store');
        Route::get('/','PostController@index')->name('admin.post.index');
        Route::get('/list', 'PostController@list')->name('admin.post.list');
        Route::get('/destroy/{id}','PostController@destroy')->name('admin.post.destroy');
        Route::get('/{id}/show','PostController@show')->name('admin.post.show');
        Route::get('/edit/{id}','PostController@edit')->name('admin.post.edit');
        Route::post('/edit/{id}','PostController@update')->name('admin.post.update');
//        Route::get('/view','PostController@view')->name('admin.post.view');
        Route::get('/search', 'PostController@search')->name('admin.post.search');
        Route::get('/filter', 'PostController@filterByCatogory')->name('admin.post.filterByCatogory');
    });
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UserController@edit')->name('auth.profile.edit');
Route::post('/users', 'UserController@update')->name('auth.profile.update');
Route::get('/changePassword', 'UserController@view')->name('auth.passwords.changePassword');
Route::post('/changePassword', 'UserController@changePassword')->name('changePassword');
Route::group(['prefix' => 'catogories'], function () {
    Route::get('/','CatogoryController@index')->name('catogories.index');
    Route::get('/create','CatogoryController@create')->name('catogories.create');
    Route::post('/create','CatogoryController@store')->name('catogories.store');
    Route::get('/{id}/edit','CatogoryController@edit')->name('catogories.edit');
    Route::post('/edit/{id}','CatogoryController@update')->name('catogories.update');
    Route::get('/{id}/delete','CatogoryController@destroy')->name('catogories.destroy');
    Route::get('/list', 'CatogoryController@list')->name('catogories.list');
});