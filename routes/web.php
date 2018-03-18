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

/* Halaman Tingkat Pendidikan *pada akses admin */
Route::get('/admin/degree', 'AdminController@degree')->name('degree');
Route::get('/admin/degree/create', 'AdminController@createdegree')->name('createdegree');
Route::post('/admin/degree/store', 'AdminController@storedegree')->name('storedegree');
Route::get('/admin/degree/edit/{degree}', 'AdminController@editdegree')->name('editdegree');
Route::post('/admin/degree/update/{degree}', 'AdminController@updatedegree')->name('updatedegree');
Route::delete('/admin/degree/{degree}', 'AdminController@destroydegree')->name('destroydegree');

/* Halaman pelajaran *pada akses admin */
Route::get('/admin/lesson', 'AdminController@lesson')->name('lesson');
Route::get('/admin/lesson/create', 'AdminController@createlesson')->name('createlesson');
Route::post('/admin/lesson/store', 'AdminController@storelesson')->name('storelesson');
Route::get('/admin/lesson/edit/{lesson}', 'AdminController@editlesson')->name('editlesson');
Route::post('/admin/lesson/update/{lesson}', 'AdminController@updatelesson')->name('updatelesson');
Route::delete('/admin/lesson/{lesson}', 'AdminController@destroylesson')->name('destroylesson');

/* Halaman buku LKS *pada akses admin */
Route::get('/admin/book', 'AdminController@book')->name('book');
Route::get('/admin/book/create', 'AdminController@createbook')->name('createbook');
Route::post('/admin/book/store', 'AdminController@storebook')->name('storebook');
Route::get('/admin/book/edit/{book}', 'AdminController@editbook')->name('editbook');
Route::post('/admin/book/update/{book}', 'AdminController@updatebook')->name('updatebook');
Route::delete('/admin/book/{book}', 'AdminController@destroybook')->name('destroybook');

/* Halaman untuk pemisah soal pada buku LKS *akses admin */
Route::get('/admin/section/{book}', 'AdminController@section')->name('section');

/* Halaman pertanyaan *pada akses admin */
Route::get('/admin/question/{book}', 'AdminController@question')->name('question');
Route::get('/admin/question/create', 'AdminController@createquestion')->name('createquestion');

Route::get('/home', 'HomeController@index')->name('home');
