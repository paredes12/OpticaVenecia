<?php
Route::group(['middelware'=>['can:leer empleado']],function(){
    Route::get('/empleado','EmpleadoController@empleados')->name('empleados');   
});
Route::group(['middelware'=>['can:editar empleado']],function(){
    Route::get('/editarEmpleado/{id}','EmpleadoController@editarEmpleadoView')->name('editarEmpleadoView');
    Route::post('/editEmployee/{id}','EmpleadoController@editarEmpleado')->name('editarEmpleado');
});
Route::group(['middelware'=>['can:eliminar empleado']],function(){
    Route::post('/eliminarEmpleado/{id}','EmpleadoController@eliminarEmpleado')->name('eliminarEmpleadoView');   
});
