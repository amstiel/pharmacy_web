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

Route::view('/', 'index');
Route::resource('/transactions', 'TransactionController');
Route::resource('/drugs', 'DrugController');
Route::resource('/providers', 'ProviderController');
Route::resource('/categories', 'CategoryController');
Route::get('/providers-by-cities', 'ReportController@providersByCities');
Route::get('/pricelist', 'ReportController@pricelist');
Route::get('/sales', 'ReportController@sales');
Route::get('/receipts/{id}', 'ReportController@receipt');

//Route::view('/create-sale', ' ');

Route::get('/create-sale', 'SaleController@create');
Route::post('/sales', 'SaleController@store');
