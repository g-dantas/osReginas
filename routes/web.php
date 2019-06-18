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
    return redirect('os_header');
});
Route::middleware(['auth'])
     ->group(function (){
         Route::resource('departamentos', 'DepartamentoController');
         Route::resource('defeitos', 'DefeitoController');
         Route::resource('tipos_usuarios', 'TipoUsuarioController');
         Route::resource('status_os', 'StatusOSController');
         Route::resource('os_header', 'OsHeaderController');
         Route::resource('os_body', 'OsBodyController');
         Route::put('/os_body/atendimento/{id}',
             [ 'as' => 'os_body.atendimento',
                 'uses' => 'OsBodyController@emAtendimento']);
         Route::get('/os_body/novo_atendimento/{id}',
             [ 'as' => 'os_body.novo_atendimento',
                 'uses' => 'OsBodyController@novoAtendimento']);
         Route::post('/os_body/confirma_finalizacao/{id}',
             [ 'as' => 'os_body.confirma_finalizacao',
                 'uses' => 'OsBodyController@confirmaFinalizacao']);
         Route::get('user/logout',
             [ 'as' => 'user.logout',
               'uses' => 'UserController@logout']);
         Route::get('monitoramento', 'OsHeaderController@monitoramento')->name('monitoramento');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
