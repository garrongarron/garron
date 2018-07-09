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
Route::get('/home', 'ITResources@init');




Route::group(['middleware'=>'auth'], function(){
	Route::get('/ITResources/home', 'ITResources@offer')
		->name('ITResources.professional.home')	;
	Route::get('/ITResources/apply', 'EmployeeController@apply')
			->name('ITResources.apply');
	
	Route::get('/ITResources/soy/{position}/{slug}', 'ITResources@offer')
			->name('ITResources.Iam2');
	Route::get('/ITResources/update', 'ITResources@update')
			->name('ITResources.update');
	
	Route::get('/ITResources/soy', 'ITResources@offer')
			->name('ITResources.Iam')
			->middleware('auth');

	Route::resource('experience','ExperienceController');
	Route::resource('education','EducationController');
	Route::resource('position','PositionController');
	Route::post('/ITResources/skills', 'ITResources@saveSkill');
	Route::post('/ITResources/skillSuggestion', 'ITResources@skillSuggestion');
	Route::post('/ITResources/skillsDelete', 'ITResources@skillsDelete');
});


Route::resource('positionloader','PositionLoaderController');

Route::get('/ITResources/busco', 'ITResources@searchProfesional')
			->name('ITResources.searchProfesional');


Route::get('/ITResources/busco/{position}', 'ITResources@search')
		->name('ITResources.search');
Route::get('/ITResources/perfil/{slug}', 'ITResources@profile')
		->name('ITResources.profile');


Route::get('/ITResources/empleos', 'ITResources@jobs')
		->name('ITResources.searchJobs');
Route::get('/ITResources/empleos/{position}', 'ITResources@jobs')
		->name('ITResources.jobs');
Route::get('/ITResources/posicion/{position}', 'ITResources@position')
		->name('ITResources.position');



/*Route::get('/ITResources/salario/{position}', 'ITResources@salary')
		->name('ITResources.salary');
Route::get('/ITResources/tareas/{position}', 'ITResources@salary')
		->name('ITResources.tasks');
Route::get('/ITResources/tablero', 'ITResources@board')
		->name('ITResources.board');

Route::get('/welcome', function () {
    return view('welcome');
});
*/


Auth::routes();

Route::get('termsandconditions', function(){
	return view('ITResources.termsandconditions');
})->name('policies');
Route::get('test', function(){
	return view('emails.wellcome');
});
Route::get('test2', function(){
	return view('emails.applyToPosition');
});


