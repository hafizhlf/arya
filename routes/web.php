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

/* Halaman Admin */
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/degree', 'AdminController@degree')->name('degree');
Route::get('/admin/degree/create', 'AdminController@createdegree')->name('createdegree');
Route::post('/admin/degree/store', 'AdminController@storedegree')->name('storedegree');
Route::get('/admin/degree/edit/{degree}', 'AdminController@editdegree')->name('editdegree');
Route::post('/admin/degree/update/{degree}', 'AdminController@updatedegree')->name('updatedegree');
Route::delete('/admin/degree/{degree}', 'AdminController@destroydegree')->name('destroydegree');

Route::get('/home', 'HomeController@index')->name('home');
