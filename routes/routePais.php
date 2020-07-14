<?php
Route::group(['middleware'=>['can:leer pais']],function(){
    Route::get('/Pais','PaisController@Paises')->name('paises');
});

Route::group(['middleware'=>['can:crear pais']],function(){
    Route::get('/crearPais','PaisController@crearPaisView')->name('crearPaisView');
    Route::post('/createPais','PaisController@crearPais')->name('crearPais');
});

Route::group(['middleware'=>['can:editar pais']],function(){
    Route::get('/editarPais/{id}','PaisController@editarPaisView')->name('editarPaisView');
    Route::post('/editPais/{id}','PaisController@editarPais')->name('editarPais');
});

Route::group(['middleware'=>['can:eliminar pais']],function(){
    Route::post('/eliminarPais/{id}','PaisController@eliminarPais')->name('eliminarPaisView');   
});