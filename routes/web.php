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
Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/',  'UserController@dashboard');
    Route::get('logout', 'Auth\LoginController@logout');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    //Admin
    Route::resource('metas', 'GoalController');
    Route::resource('cargos', 'OfficeController');
    Route::resource('funcionarios', 'UserController');

    //All
    Route::resource('relatorios', 'ReportController');
    Route::resource('anotacoes', 'NoteController');
    Route::resource('mentoria', 'MentoringController');

    // Registration Routes...
    Route::get( 'register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
});