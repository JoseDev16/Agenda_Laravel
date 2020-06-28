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
Route::view('/', 'welcome');
Route::view('/home', 'welcome');
Route::get('/notas', 'NotaController@index')->name('home');
Route::post('/new', 'NotaController@store')->name('store');
Route::get('/editar/{id}', 'NotaController@edit')->name('editar');
Route::put('/update/{id}', 'NotaController@update')->name('update');
Route::delete('/delete/{id}', 'NotaController@destroy')->name('eliminar');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
