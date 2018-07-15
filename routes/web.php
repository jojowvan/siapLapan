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

Route::get('/home', 'HomeController@index')->name('admin.dashboard');

Route::prefix('admin')->group(function(){
  Route::get('/tambahStaff', 'AdminController@view')->name('tambahStaff.view');
  Route::post('/tambahStaff', 'AdminController@create')->name('tambahStaff.create');

  Route::get('/lihatStaff', 'UserController@readAll')->name('lihatStaff.readAll');
  Route::get('/lihatAnggota/{id}', 'UserController@view')->name('anggota.view');
  Route::get('/editScholarship/{id}/edit', 'UserController@edit')->name('anggota.edit');
});
