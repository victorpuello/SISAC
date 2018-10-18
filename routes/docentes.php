<?php
Route::resource('indicadors', 'IndicadorController');
Route::resource('planillas', 'PlanillaController')->only(['index','update']);
Route::resource('notas', 'NotaController')->only(['store']);
Route::middleware(['verifyPlanilla','verifyIndicadores'])->group(function (){
    Route::get('planillas/{planilla}','PlanillaController@show')->name('planillas.show');
});
Route::get('/direccion', 'DireccionController@index')->name('direccion.index');
Route::get('/direccion/getDefinitivas/{estudiante}', 'DefinitivaController@getDefinitivas')->name('direccion.getdefinitivas');
Route::get('/direccion/getObservador/{estudiante}', 'AnotacionController@getObservador')->name('direccion.getobservador');
Route::get('/direccion/getacudiente/{estudiante}', 'DireccionController@getAcudiente')->name('direccion.getacudiente');
Route::get('/direccion/getmatricula/{estudiante}', 'DireccionController@getMatricula')->name('direccion.getmatricula');
Route::resource('acudiente', 'AcudienteController')->only(['edit','store','update','destroy']);
Route::get('acudiente/{estudiante}', 'AcudienteController@create')->name('acudiente.create');
Route::resource('estudiantes', 'EstudianteController')->only(['update','edit']);
Route::get('estudiantes/municipios/{id}',['as' => 'municipios', 'uses' => 'MunicipioController']);
//Route::resource('asignaciones', 'AsignacionController');
//Route::resource('reportes', 'ReportesController')->only(['index']);
////Route::resource('/direccion/anotaciones', 'AnotacionController');
//Route::post('reportes/academico/sabana', 'ReportesController@sabana')->name('reportes.academico.sabana');
////Route::post('reportes/academico/logros', 'ReportesController@reporteLogros')->name('reportes.academico.logros');
//
////Route::get('logros/loaddata/{id}',['as'=>'logros.loaddata', 'uses' => 'LogroController@loadDataBuscador']);
////Route::post('logros/findnotes',['as'=>'logros.findnotes', 'uses' => 'LogroController@FindNotes']);

