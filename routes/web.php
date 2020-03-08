<?php


Route::view('/', 'home')->name('home');
Route::view('/quienes-somos', 'about')->name('about');

Route::resource('academico','academicController')
    ->names('academics')
    ->parameters(['academico' => 'academic']);

Route::get('/pautaEvaluaciones/{evaluacion}/crearEvaluacion', 'evaluacionController@createEvaluation')->name('evaluaciones.createEvaluation');
Route::patch('/pautaEvaluaciones/promedio', 'evaluacionController@promedio')->name('evaluaciones.promedio');
Route::resource('pautaEvaluaciones','evaluacionController')
    ->names('evaluaciones')
    ->parameters(['pautaEvaluaciones' => 'evaluacion']); 
    

Route::view('/contacto', 'contact')->name('contact');
Route::post('contact','MessageController@store')->name('messages.store');
Route::get('/facultades/{facultad}/indiv', 'facultadController@indiv')->name('facultades.indiv');
//-----------------------------Insertar------------------------------------------------------------
Route::get('/facultades/add_facultad', 'facultadController@create')->name('facultades.add_facultad');
Route::POST('/add_facultad', 'facultadController@store')->name('facultad.store');
//-----------------------------Mostrar------------------------------------------------------------
Route::get('/facultades/show', 'facultadController@index')->name('facultades.show');
Route::get('/facultades/fuente', 'facultadController@show')->name('facultades.fuente');
//-----------------------------Actualizar------------------------------------------------------------
Route::get('/facultades/{facultad}/editar', 'facultadController@edit')->name('facultades.edit');
Route::patch('/facultades/{facultad}', 'facultadController@update')->name('facultades.update');
//-----------------------------Eliminar-------------------------------------------------------------
Route::delete('/facultades/{facultad}', 'facultadController@destroy')->name('facultades.destroy');
//--------------------------------------------------------------------------------------------------

//-----------------------------------DEPARTAMENTOS----------------------------------------------------
//--INDEX---------------------------------------------------------------------------------------------

Route::get('/departamentos/{departamento}/indiv', 'departamentoController@indiv')->name('departamentos.indiv');
//--Insertar------------------------------------------------------------------------------------------
Route::get('/departamentos/add_departamentos', 'departamentoController@create')->name('departamentos.add_departamentos');
Route::POST('/add_departamentos', 'departamentoController@store')->name('departamento.store');
//--show----------------------------------------------------------------------------------------------
Route::get('/departamentos/show', 'departamentoController@show')->name('departamentos.show');
//-----------------------------Actualizar------------------------------------------------------------
Route::get('/departamentos/{departamento}/editar', 'departamentoController@edit')->name('departamentos.edit');
Route::patch('/departamentos/{departamento}', 'departamentoController@update')->name('departamentos.update');
//-----------------------------Eliminar-------------------------------------------------------------
Route::delete('/departamentos/{departamento}', 'departamentoController@destroy')->name('departamentos.destroy');
//--------------------------------------------------------------------------------------------------

Auth::routes(['register' => true]);
 


