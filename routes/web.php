<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin_colombia');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/news',function(){
	return view('admin_colombia');
})->name('news');

// Bancos
Route::get('/config/bancos/')->uses('BancoController@index')->name('config.bancos')->middleware('auth');
Route::get('/config/bancos/insert')->uses('BancoController@insertPage')->name('config.bancos.insert')->middleware('auth');
Route::post('/config/bancos/insert/form')->uses('BancoController@insertForm')->name('config.bancos.insert.form')->middleware('auth');
Route::get('/config/bancos/update/{banco_id}')->uses('BancoController@updatePage')->name('config.bancos.update')->middleware('auth');
Route::post('/config/bancos/update/form')->uses('BancoController@updateForm')->name('config.bancos.update.form')->middleware('auth');
Route::get('/config/bancos/delete/{banco_id}')->uses('BancoController@deletePage')->name('config.bancos.delete')->middleware('auth');
Route::post('/config/bancos/delete/form')->uses('BancoController@deleteForm')->name('config.bancos.delete.form')->middleware('auth');


// Unidades de Medida
Route::get('/config/unidadmedida/')->uses('UnidadMedidaController@index')->name('config.unidadmedida')->middleware('auth');
Route::get('/config/unidadmedida/insert')->uses('UnidadMedidaController@insertPage')->name('config.unidadmedida.insert')->middleware('auth');
Route::post('/config/unidadmedida/insert/form')->uses('UnidadMedidaController@insertForm')->name('config.unidadmedida.insert.form')->middleware('auth');
Route::get('/config/unidadmedida/update/{unidmed_id}')->uses('UnidadMedidaController@updatePage')->name('config.unidadmedida.update')->middleware('auth');
Route::post('/config/unidadmedida/update/form')->uses('UnidadMedidaController@updateForm')->name('config.unidadmedida.update.form')->middleware('auth');
Route::get('/config/unidadmedida/delete/{unidmed_id}')->uses('UnidadMedidaController@deletePage')->name('config.unidadmedida.delete')->middleware('auth');
Route::post('/config/unidadmedida/delete/form')->uses('UnidadMedidaController@deleteForm')->name('config.unidadmedida.delete.form')->middleware('auth');
//Impuestos
Route::get('/config/impuestos/')->uses('ImpuestosController@index')->name('config.impuestos')->middleware('auth');
Route::get('/config/impuestos/insert')->uses('ImpuestosController@insertPage')->name('config.impuestos.insert')->middleware('auth');
Route::post('/config/impuestos/insert/form')->uses('ImpuestosController@insertForm')->name('config.impuestos.insert.form')->middleware('auth');
Route::get('/config/impuestos/update/{impuesto_id}')->uses('ImpuestosController@updatePage')->name('config.impuestos.update')->middleware('auth');
Route::post('/config/impuestos/update/form')->uses('ImpuestosController@updateForm')->name('config.impuestos.update.form')->middleware('auth');
Route::get('/config/impuestos/delete/{impuesto_id}')->uses('ImpuestosController@deletePage')->name('config.impuestos.delete')->middleware('auth');
Route::post('/config/impuestos/delete/form')->uses('ImpuestosController@deleteForm')->name('config.impuestos.delete.form')->middleware('auth');
