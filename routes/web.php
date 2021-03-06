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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('cursos', 'CursoController');
Route::resource('alunos', 'AlunoController');
Route::resource('empresas', 'EmpresaController');
Route::resource('professores', 'ProfessorController', ['parameters' => ['professores' => 'professor']]);
Route::resource('documentos', 'DocumentoController');
Route::resource('estagios', 'EstagioController');
Route::get('/checklist', 'ChecklistController@index');
Route::post('/checklist', 'ChecklistController@store');
