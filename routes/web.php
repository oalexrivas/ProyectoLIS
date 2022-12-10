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
Route::resource('transacciones', 'transaccionesController');

Route::get('/Depositar', 'transaccionesController@depositos')->name('RegistrarDeposito');
Route::get('/Retirar', 'transaccionesController@retiros')->name('RegistrarRetiro');
Route::get('/ObtenerSaldo', 'transaccionesController@versaldo')->name('saldo');
Route::post('/ObtenerSaldo', 'transaccionesController@consultarsaldo')->name('consultarsaldo');

Route::get('/ObtenerTransacciones', 'transaccionesController@vertransacciones')->name('vertrans');
Route::post('/ObtenerTransacciones', 'transaccionesController@consultartransacciones')->name('vertrans');
