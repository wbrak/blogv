<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'GuestController@index');

Auth::routes();

Route::get('inicio', 'HomeController@index')->name('inicio');

Route::get('/entradas/crear', 'EntryController@create');
Route::post('/entradas', 'EntryController@store');

Route::get('/entradas/{entry}', 'GuestController@show');
Route::get('/entradas/{entry}/editar', 'EntryController@edit');

Route::put('/entradas/{entry}', 'EntryController@update');

Route::get('/usuarios/{user}', 'UserController@show');