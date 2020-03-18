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
    
Route::get('/export/{academic}', 'academicController@export')->name('academics.export');

Route::view('/contacto', 'contact')->name('contact');
Route::post('contact','MessageController@store')->name('messages.store');

//-------------------------------------FACULTADES---------------------------------------------------
Route::get('/facultades/{facultad}/indiv', 'facultadController@indiv')->name('facultades.indiv');
//-----------------------------Insertar------------------------------------------------------------
Route::get('/facultades/add_facultad', 'facultadController@create')->name('facultades.add_facultad');
Route::POST('/add_facultad', 'facultadController@store')->name('facultad.store');
Route::get('/facultades/temporal', 'facultadController@temp')->name('facultades.temporal');
//-----------------------------Mostrar------------------------------------------------------------
Route::get('/facultades/show', 'facultadController@index')->name('facultades.show');
Route::get('/facultades/fuente', 'facultadController@show')->name('facultades.fuente');
//-----------------------------Actualizar------------------------------------------------------------
Route::get('/facultades/{facultad}/editar', 'facultadController@edit')->name('facultades.edit');
Route::patch('/facultades/{facultad}', 'facultadController@update')->name('facultades.update');
//-----------------------------Eliminar-------------------------------------------------------------
Route::delete('/facultades/{facultad}', 'facultadController@destroy')->name('facultades.destroy');
Route::patch('/facultades/{usuario}/usermod', 'facultadController@usermod')->name('facultades.usermod');
//--------------------------------------------------------------------------------------------------

//-----------------------------------DEPARTAMENTOS----------------------------------------------------
//--INDEX---------------------------------------------------------------------------------------------

Route::get('/departamentos/{departamento}/indiv', 'departamentoController@indiv')->name('departamentos.indiv');
//--Insertar------------------------------------------------------------------------------------------
Route::get('/departamentos/add_departamentos', 'departamentoController@create')->name('departamentos.add_departamentos');
Route::POST('/add_departamentos', 'departamentoController@store')->name('departamento.store');
Route::get('/departamentos/temporal', 'departamentoController@temp')->name('departamentos.temporal');
//--show----------------------------------------------------------------------------------------------
Route::get('/departamentos/show', 'departamentoController@show')->name('departamentos.show');
//-----------------------------Actualizar------------------------------------------------------------
Route::get('/departamentos/{departamento}/editar', 'departamentoController@edit')->name('departamentos.edit');
Route::patch('/departamentos/{departamento}', 'departamentoController@update')->name('departamentos.update');
//-----------------------------Eliminar-------------------------------------------------------------
Route::delete('/departamentos/{departamento}', 'departamentoController@destroy')->name('departamentos.destroy');
Route::patch('/departamentos/{usuario}/usermod', 'departamentoController@usermod')->name('departamentos.usermod');
//--------------------------------------------------------------------------------------------------


Route::get('usuarios/{id}/eliminar', [
    'uses' => 'Auth\RegisterController@eliminar',
    'as' => 'eliminar'
    ]);

Route::get('/evaluacion2', 'evaluacionController@vertodo')->name('evaluacion');
Route::get('descargar-evaluaciones', 'evaluacionController@pdf')->name('evaluaciones.pdf');

Route::get('/evaluacionp/{academic}', 'evaluacionController@vertodop')->name('evaluacionp');
Route::get('descargar-evaluaciones/{academic}', 'evaluacionController@pdfp')->name('evaluacionesp.pdf');

Auth::routes(['register' => true]);
 


