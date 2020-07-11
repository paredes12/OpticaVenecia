<?php
Route::group(['middleware'=>['can:leer cliente']],function(){
    Route::get('/cliente','ClienteController@clientes')->name('clientes');
});

Route::group(['middleware'=>['can:crear cliente']],function(){
    Route::get('/crearCliente','ClienteController@crearClienteView')->name('crearClienteView');
    Route::post('/createClient','ClienteController@crearCliente')->name('crearCliente');
});

Route::group(['middleware'=>['can:editar cliente']],function(){
    Route::get('/editarCliente/{id}','ClienteController@editarClienteView')->name('editarClienteView');
    Route::post('/editClient/{id}','ClienteController@editarCliente')->name('editarCliente');
});

Route::group(['middleware'=>['can:eliminar cliente']],function(){
    Route::post('/eliminarCliente/{id}','ClienteController@eliminarCliente')->name('eliminarClienteView');   
});
