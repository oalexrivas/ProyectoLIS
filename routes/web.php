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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('tiposCuentas', 'tiposCuentasController');
Route::resource('formaspagos', 'formaspagosController');
Route::resource('tipostransacciones', 'tipostransaccionesController');
Route::resource('cuentas', 'cuentasController');
Route::resource('transacciones', 'transaccionesController')->only([
    'store'
]);

Route::get('/Depositar', 'transaccionesController@depositos')->name('RegistrarDeposito');
Route::get('/Retirar', 'transaccionesController@retiros')->name('RegistrarRetiro');

//Route::post('/Guardado', 'transaccionesController@guardartransaccion')->name('GuardarTransaccion');
Route::get('/VerEntradas', 'RegistrosController@verEntradas')->name('VerEntradas');
Route::get('/VerSalidas', 'RegistrosController@verSalidas')->name('VerSalidas');
Route::get('/ReporteMovimientos', 'RegistrosController@reporte')->name('reporte');