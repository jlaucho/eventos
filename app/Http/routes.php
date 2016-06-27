<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('template.admin');
});*/


Route::group(['middleware' => 'auth'], function() {
    //

	/******  controlador de usuario  ***********/
	Route::resource('usuario','UserController');
	Route::get('usuario/{id}/destroy',[
		'uses'	=>	'UserController@destroy',
		'as'	=>	'usuario.destroy'
	]);

	/********* INventario controller **********/
	Route::resource('inventario','InventarioController');
	Route::get('inventario/{id}/destroy',[
		'uses'	=>	'InventarioController@destroy',
		'as'	=>	'inventario.destroy'
	]);

	/********** Cliente Controller ************/
	Route::resource('cliente', 'ClienteController');
	Route::get('cliente/{id}/destroy',[
		'uses'	=>	'ClienteController@destroy',
		'as'	=>	'cliente.destroy'
	]);

	/************ Evento Controller *************/
	Route::resource('evento', 'EventoController');
	Route::get('evento/{id}/create',[
		'uses'	=>	'EventoController@create',
		'as'	=>	'evento.create'
	]);

	Route::get('evento/cliente/{id}/evento/{id2}/asignar',[
		'as'	=>	'evento.asignaU',
		'uses'	=>	'EventoController@asignaU'
	]);

	/*********** Asignar Usuario controller *****/
	Route::resource('asignar', 'AsignarUsuarioController');
	Route::get('asignar/cliente/{id}/evento/{id2}/asignar',[
		'as'	=>	'asignarU.asignarE',
		'uses'	=>	'AsignarUsuarioController@show'
	]);


	/********** Asignar Implemento controller *******/
	Route::resource('implementos', 'AsignarImplementoController');

	/************* Asignar a los dias las actividades ***************************/
	Route::resource('actividades', 'AsignarActividadDiaController');
	Route::get('actividades/cliente/{id}/evento/{id2}/asignar',[
		'as'	=>	'actividades.asignarDia',
		'uses'	=>	'AsignarActividadDiaController@create'
	]);
});


Route::auth();

Route::get('/', 'HomeController@index');
