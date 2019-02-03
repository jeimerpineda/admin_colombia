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
Route::post('/config/unidadmedida/insert/form/fast')->uses('UnidadMedidaController@insertFormFast')->name('config.unidadmedida.insert.form.fast')->middleware('auth');

//Impuestos
Route::get('/config/impuestos/')->uses('ImpuestosController@index')->name('config.impuestos')->middleware('auth');
Route::get('/config/impuestos/insert')->uses('ImpuestosController@insertPage')->name('config.impuestos.insert')->middleware('auth');
Route::post('/config/impuestos/insert/form')->uses('ImpuestosController@insertForm')->name('config.impuestos.insert.form')->middleware('auth');
Route::get('/config/impuestos/update/{impuesto_id}')->uses('ImpuestosController@updatePage')->name('config.impuestos.update')->middleware('auth');
Route::post('/config/impuestos/update/form')->uses('ImpuestosController@updateForm')->name('config.impuestos.update.form')->middleware('auth');
Route::get('/config/impuestos/delete/{impuesto_id}')->uses('ImpuestosController@deletePage')->name('config.impuestos.delete')->middleware('auth');
Route::post('/config/impuestos/delete/form')->uses('ImpuestosController@deleteForm')->name('config.impuestos.delete.form')->middleware('auth');


// Route::get('/ventaspos/facturacion/')->uses('facturacionController@index')->name('ventaspos.facturacion')->middleware('auth');

// Route::post('/config/impuestos/insert/form/fast')->uses('ImpuestosController@insertFormFast')->name('config.impuestos.insert.form.fast')->middleware('auth');

// Facturación
Route::get('/ventaspos/facturacion/')->uses('facturacionController@index')->name('ventaspos.facturacion')->middleware('auth');
Route::post('ventaspos/facturacion/producto')->uses('facturacionController@getProducto')->name('ventaspos.facturacion.getproducto')->middleware('auth');

Route::get('/ventaspos/facturacion/insert')->uses('facturacionController@insertPage')->name('ventaspos.facturacion.insert')->middleware('auth');
Route::post('/ventaspos/facturacion/insert/form')->uses('facturacionController@insertForm')->name('ventaspos.facturacion.insert.form')->middleware('auth');
Route::get('/ventaspos/facturacion/update/{factura_id}')->uses('facturacionController@updatePage')->name('ventaspos.facturacion.update')->middleware('auth');
Route::post('/ventaspos/facturacion/update/form')->uses('facturacionController@updateForm')->name('ventaspos.facturacion.update.form')->middleware('auth');
Route::get('/ventaspos/facturacion/delete/{factura_id}')->uses('facturacionController@deletePage')->name('ventaspos.facturacion.delete')->middleware('auth');
Route::post('/ventaspos/facturacion/delete/form')->uses('facturacionController@deleteForm')->name('ventaspos.facturacion.delete.form')->middleware('auth');

//Formas de Pago
Route::get('/config/formasdepago/')->uses('FormasPagoController@index')->name('config.formasdepago')->middleware('auth');
Route::get('/config/formasdepago/insert')->uses('FormasPagoController@insertPage')->name('config.formasdepago.insert')->middleware('auth');
Route::post('/config/formasdepago/insert/form')->uses('FormasPagoController@insertForm')->name('config.formasdepago.insert.form')->middleware('auth');
Route::get('/config/formasdepago/update/{formaspago_id}')->uses('FormasPagoController@updatePage')->name('config.formasdepago.update')->middleware('auth');
Route::post('/config/formasdepago/update/form')->uses('FormasPagoController@updateForm')->name('config.formasdepago.update.form')->middleware('auth');
Route::get('/config/formasdepago/delete/{formaspago_id}')->uses('FormasPagoController@deletePage')->name('config.formasdepago.delete')->middleware('auth');
Route::post('/config/formasdepago/delete/form')->uses('FormasPagoController@deleteForm')->name('config.formasdepago.delete.form')->middleware('auth');

// Tipos de Facturas
Route::get('/config/tiposdefacturas/')->uses('TiposFacturaController@index')->name('config.tiposdefacturas')->middleware('auth');
Route::get('/config/tiposdefacturas/insert')->uses('TiposFacturaController@insertPage')->name('config.tiposdefacturas.insert')->middleware('auth');
Route::post('/config/tiposdefacturas/insert/form')->uses('TiposFacturaController@insertForm')->name('config.tiposdefacturas.insert.form')->middleware('auth');
Route::get('/config/tiposdefacturas/update/{tipfacturas_ide}')->uses('TiposFacturaController@updatePage')->name('config.tiposdefacturas.update')->middleware('auth');
Route::post('/config/tiposdefacturas/update/form')->uses('TiposFacturaController@updateForm')->name('config.tiposdefacturas.update.form')->middleware('auth');
Route::get('/config/tiposdefacturas/delete/{tipfacturas_ide}')->uses('TiposFacturaController@deletePage')->name('config.tiposdefacturas.delete')->middleware('auth');
Route::post('/config/tiposdefacturas/delete/form')->uses('TiposFacturaController@deleteForm')->name('config.tiposdefacturas.delete.form')->middleware('auth');

//Empresa
Route::get('/config/empresa/')->uses('EmpresaController@index')->name('config.empresa')->middleware('auth');
Route::get('/config/empresa/insert')->uses('EmpresaController@insertPage')->name('config.empresa.insert')->middleware('auth');
Route::post('/config/empresa/insert/form')->uses('EmpresaController@insertForm')->name('config.empresa.insert.form')->middleware('auth');
Route::get('/config/empresa/update/{empresa_ide}')->uses('EmpresaController@updatePage')->name('config.empresa.update')->middleware('auth');
Route::post('/config/empresa/update/form')->uses('EmpresaController@updateForm')->name('config.empresa.update.form')->middleware('auth');
Route::get('/config/empresa/delete/{empresa_ide}')->uses('EmpresaController@deletePage')->name('config.empresa.delete')->middleware('auth');
Route::post('/config/empresa/delete/form')->uses('EmpresaController@deleteForm')->name('config.empresa.delete.form')->middleware('auth');


// =======
// Route::post('/config/empresa/insert/form/fast')->uses('EmpresaController@insertFormFast')->name('config.empresa.insert.form.fast')->middleware('auth');
// >>>>>>> pr/7

//Clientes
Route::get('/config/clientes/')->uses('ClientesController@index')->name('config.clientes')->middleware('auth');
Route::get('/config/clientes/insert')->uses('ClientesController@insertPage')->name('config.clientes.insert')->middleware('auth');
Route::post('/config/clientes/insert/form')->uses('ClientesController@insertForm')->name('config.clientes.insert.form')->middleware('auth');
Route::get('/config/clientes/update/{cliente_ide}')->uses('ClientesController@updatePage')->name('config.clientes.update')->middleware('auth');
Route::post('/config/clientes/update/form')->uses('ClientesController@updateForm')->name('config.clientes.update.form')->middleware('auth');
Route::get('/config/clientes/delete/{cliente_ide}')->uses('ClientesController@deletePage')->name('config.clientes.delete')->middleware('auth');
Route::post('/config/clientes/delete/form')->uses('ClientesController@deleteForm')->name('config.clientes.delete.form')->middleware('auth');

//Productos
Route::get('/config/productos/')->uses('ProductosController@index')->name('config.productos')->middleware('auth');
Route::get('/config/productos/insert')->uses('ProductosController@insertPage')->name('config.productos.insert')->middleware('auth');
Route::post('/config/productos/insert/form')->uses('ProductosController@insertForm')->name('config.productos.insert.form')->middleware('auth');
Route::get('/config/productos/update/{producto_ide}')->uses('ProductosController@updatePage')->name('config.productos.update')->middleware('auth');
Route::post('/config/productos/update/form')->uses('ProductosController@updateForm')->name('config.productos.update.form')->middleware('auth');
Route::get('/config/productos/delete/{producto_ide}')->uses('ProductosController@deletePage')->name('config.productos.delete')->middleware('auth');
Route::post('/config/productos/delete/form')->uses('ProductosController@deleteForm')->name('config.productos.delete.form')->middleware('auth');
