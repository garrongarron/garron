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

Route::get('/', 'Garron@home');
Route::get('/locale', 'Garron@chooser');


Route::get('/ITResources', 'ITResources@init')->name('ITResources');
Route::get('/ITResources/busco/{position}', 'ITResources@search')->name('ITResources.search');
Route::get('/ITResources/soy/{position}/{slug}', 'ITResources@offer')
					->name('ITResources.Iam2')
					->middleware('auth');
Route::get('/ITResources/soy', 'ITResources@offer')
					->name('ITResources.Iam')
					->middleware('auth');

Route::get('/ITResources/update', 'ITResources@update')
					->name('ITResources.update')
					->middleware('auth');

Route::get('/ITResources/empleos/{position}', 'ITResources@jobs')->name('ITResources.jobs');
Route::get('/ITResources/posicion/{position}', 'ITResources@position')->name('ITResources.position');

Route::get('/ITResources/salario/{position}', 'ITResources@salary')->name('ITResources.salary');
Route::get('/ITResources/tareas/{position}', 'ITResources@salary')->name('ITResources.tasks');

Route::get('/ITResources/tablero', 'ITResources@board')->name('ITResources.board');

Route::get('/welcome', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'ITResources@init')->name('ITResources');
