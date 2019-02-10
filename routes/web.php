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
Route::get('/create_form', 'MustraController@create_form');
Route::get('/create/{id}', 'MustraController@create');

Route::get('/view/{id}', 'MustraController@show');



Route::post('/save_list','MustraController@save_list');
Route::post('/create_task','MustraController@create_task');
Route::post('/change_task_status','MustraController@change_task_status');


