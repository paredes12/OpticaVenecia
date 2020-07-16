<?php
Route::group(['middleware'=>['can:generar planilla']],function(){
    Route::get('/planilla','PlanillaController@planilla')->name('planilla');
});
