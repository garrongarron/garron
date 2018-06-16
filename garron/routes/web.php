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

Route::get('/', 'HomeController@home');
Route::get('/locale', 'HomeController@chooser');


Route::get('/ITResources', 'ITResources@init')->name('ITResources');
Route::get('/ITResources/busco/{position}', 'ITResources@search')->name('ITResources.search');
Route::get('/ITResources/soy/{position}', 'ITResources@offer')->name('ITResources.Iam');

Route::get('/ITResources/salario/{position}', 'ITResources@salary')->name('ITResources.salary');
Route::get('/ITResources/tareas/{position}', 'ITResources@salary')->name('ITResources.tasks');

Route::get('/welcome', function () {
    return view('welcome');
});


