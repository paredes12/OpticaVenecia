<?php
Route::group(['middleware'=>['can:leer lugar de trabajo']],function(){
    Route::get('/empresas','Lugar_de_trabajoController@leerLugarDeTrabajo')->name('empresas');
});

Route::group(['middleware'=>['can:crear lugar de trabajo']],function(){
    Route::get('/crearLugarDeTrabajo','Lugar_de_trabajoController@crearLugarDeTrabajoView')->name('crearLugarDeTrabajoView');
    Route::post('/createLugarDeTrabajo','Lugar_de_trabajoController@crearLugarDeTrabajo')->name('crearLugarDeTrabajo');
});

Route::group(['middleware'=>['can:editar lugar de trabajo']],function(){
    Route::get('/editarLugarDeTrabajo/{id}','Lugar_de_trabajoController@editarLugarDeTrabajoView')->name('editarLugarDeTrabajoView');
    Route::post('/editLugarDeTrabajo/{id}','Lugar_de_trabajoController@editarLugarDeTrabajo')->name('editarLugarDeTrabajo');
});

Route::group(['middleware'=>['can:eliminar lugar de trabajo']],function(){
    Route::get('/eliminarLugarDeTrabajo/{id}','Lugar_de_trabajoController@eliminarLugarDeTrabajoView')->name('eliminarLugarDeTrabajoView');   
});