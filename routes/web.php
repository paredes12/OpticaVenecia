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

Route::group(['middleware' => ['role:Administrador']], function () {    
                  
});
Route::group(['middelware'=>['can:crear usuario']],function(){
    Route::get('/crearUsuario','userController@crearUsuarioView')->name('crearUsuarioView');
    Route::post('/createUser','userController@crearUsuario')->name('crearUsuario');
});

Route::group(['middelware'=>['can:editar usuario']],function(){
    Route::get('/editarUsuario/{id}','userController@editarUsuarioView')->name('editarUsuarioView');
    Route::post('/editUser/{id}','userController@editarUsuario')->name('editarUsuario');   
});
Route::group(['middelware'=>['can:leer usuario']],function(){
    Route::get('/usuarios','userController@administrarPermisos')->name('adminPermisos'); 
    Route::get('/permisos','RolController@getRoles')->name('permisos');   
});
Route::group(['middelware'=>['can:eliminar usuario']],function(){
    Route::get('/permisos/{id}','userController@desactivarUsuario')->name('desactivarUsuario');
});

//request crud rol

Route::group(['middleware' => ['can:crear rol']], function () {    
    Route::get('/crearRol','RolController@crearRoleView')->name('crearRolView');
    Route::post('/createRol','RolController@crearRole')->name('crearRole');
});
Route::group(['middleware' => ['can:editar rol']], function () {    
    Route::get('/editarRole/{id}','RolController@editarRoleView')->name('editarRolesView');
    Route::post('/editRol/{id}','RolController@editarRole')->name('editarRol'); 
    Route::get('/eliminarPermiso/{role_id}/{permission_id}','RolController@eliminarPermiso')->name('eliminarPermiso');      
});
Route::group(['middleware' => ['can:eliminar rol']], function () {    
    Route::get('/eliminarRole/{id}','RolController@eliminarRole')->name('eliminarRole');    
});
Route::group(['middleware' => ['can:leer rol']], function () {    
    Route::get('/adminRoles','RolController@adminRoles')->name('adminRoles');   
});

//RUTAS ADMINISTRADOR
//roles CRUD

//RUTAS ADMINISTRADOR 
//permiso CRUD

/*
 //request crud roles
 Route::group(['middleware' => ['role:super_admin']], function () { 
    Route::get('/eliminarRole','RolController@eliminarRole')->name('eliminarRole');
    Route::post('/createRol','RolController@crearRole')->name('crearRole');
    Route::post('/editRol/{id}','RolController@editarRole')->name('editarRol');
});*/