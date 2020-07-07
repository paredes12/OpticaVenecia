<?php
Route::group(['middelware'=>['can:leer cliente']],function(){
    Route::get('/cliente','ClienteController@clientes')->name('clientes');
});