<?php
Route::resource('logros', 'LogroController');
Route::resource('notas', 'NotaController');
Route::resource('asignaciones', 'AsignacionController');
Route::get('logros/loaddata/{id}',['as'=>'logros.loaddata', 'uses' => 'LogroController@loadDataBuscador']);
Route::post('logros/findnotes',['as'=>'logros.findnotes', 'uses' => 'LogroController@FindNotes']);
