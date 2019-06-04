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
    return view('layouts/app');
});

Route::resource('departamentos', 'DepartamentoController');
Route::resource('defeitos', 'DefeitoController');
Route::resource('tipos_usuarios', 'TipoUsuarioController');
Route::resource('status_os', 'StatusOSController');
Route::resource('os_header', 'OSHeaderController');
