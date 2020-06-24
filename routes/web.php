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





//Rutas de ADMINISTRADOR
//usuarios CRUD

Route::group(['middleware' => ['role:super_admin']], function () {    
    Route::get('/permisos','RolController@getRoles')->name('permisos');
    Route::get('/usuarios','userController@administrarPermisos')->name('adminPermisos');
    //crud usuarios vistas
    Route::get('/crearUsuario','userController@crearUsuarioView')->name('crearUsuarioView');
    //Route::get('/editarUsuario','userController@editarUsuarioView')->name('editarUsuarioView');    
    Route::get('/editarUsuario/{id}','userController@editarUsuarioView')->name('editarUsuarioView');
});


//request crud usuario

Route::group(['middleware' => ['role:super_admin']], function () {    
        
    Route::post('/editUser','userController@editarUsuario')->name('editarUsuario');
    Route::post('/createUser','userController@crearUsuario')->name('crearUsuario');
    
});

