<?php
Route::group(['middleware'=>['can:leer proveedor']],function(){
    Route::get('/proveedor','ProveedorController@proveedores')->name('proveedores');
});

Route::group(['middleware'=>['can:crear proveedor']],function(){
    Route::get('/crearProveedor','ProveedorController@crearProveedorView')->name('crearProveedorView');
    Route::post('/createProveedor','ProveedorController@crearProveedor')->name('crearProveedor');
});

Route::group(['middleware'=>['can:editar proveedor']],function(){
    Route::get('/editarProveedor/{id}','ProveedorController@editarProveedorView')->name('editarProveedorView');
    Route::post('/editProveedor/{id}','ProveedorController@editarProveedor')->name('editarProveedor');
});

Route::group(['middleware'=>['can:eliminar proveedor']],function(){
    Route::get('/eliminarProveedor/{id}','proveedorController@eliminarProveedorView')->name('eliminarProveedorView');   
});