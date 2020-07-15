<?php
Route::group(['middleware'=>['can:leer empleado']],function(){
    Route::get('/empleado','EmpleadoController@empleados')->name('empleados');   
});
Route::group(['middleware'=>['can:crear empleado']],function(){
    Route::get('/crearEmpleado','EmpleadoController@crearEmpleadoView')->name('crearEmpleadoView');
    Route::post('/createEmpleado','EmpleadoController@crearEmpleado')->name('crearEmpleado');
});
Route::group(['middleware'=>['can:editar empleado']],function(){
    Route::get('/editarEmpleado/{id}','EmpleadoController@editarEmpleadoView')->name('editarEmpleadoView');
    Route::post('/editEmployee/{id}','EmpleadoController@editarEmpleado')->name('editarEmpleado');
});
Route::group(['middleware'=>['can:eliminar empleado']],function(){
    Route::post('/eliminarEmpleado/{id}','EmpleadoController@eliminarEmpleado')->name('eliminarEmpleadoView');   
});
