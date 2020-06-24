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

Route::get('/', 'HomeController@index')->name('home');

//usuarios CRUD
Route::group(['middleware' => ['role:super_admin']], function () {    
    Route::get('/crearUsuario','userController@crearUsuarioView')->name('crearUsuarioView');
});

Route::group(['middleware' => ['role:super_admin']], function () {    
    Route::get('/adminPermisos','userController@administrarPermisos')->name('adminPermisos');
});

Route::group(['middleware' => ['role:super_admin']], function () {    
    Route::get('/permisos','RolController@getRoles')->name('permisos');
});

Route::group(['middleware' => ['role:super_admin']], function () {    
    Route::post('/','userController@crearUsuario')->name('crearUsuario');
});