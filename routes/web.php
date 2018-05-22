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
/*Rotas de autenticação*/
Auth::routes();
/*Rotas para a home page*/
Route::view('/', 'welcome');
Route::get('/home', 'HomeController@index')->name('home');

/*Rotas para TurmaController*/
Route::resource('/turma','TurmaController');

/*Rotas para presenças*/
Route::resource('/presenca','PresencaController');
Route::get('/presenca/turma/{idTurma}/create','PresencaController@showFormPresenca')->name('formPresenca');

/*Rotas para licao*/
Route::resource('/licao','LicaoController');
Route::get('/licao/turma/{idTurma}/create','LicaoController@showFormLicao')->name('formLicao');

/*Rotas para os recursos de usuario*/
Route::get('/user/perfil/{id}','UserResourceController@showPerfil')->name('user.perfil');
Route::get('user/{id}/edit','UserResourceController@edit')->name('user.edit');
Route::post('user/{id}/update','UserResourceController@update')->name('user.update');

