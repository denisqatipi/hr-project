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

Route::get('/employees', 'HomeController@index')->name('index');

Route::get('/employee/{id}/show', 'HomeController@show')->name('show');

Route::get('/employee/add', 'HomeController@add'); //add page
Route::get('/employee/{id}/edit', 'HomeController@edit'); //edit page

Route::post('/employee/store'); //store employee
Route::put('/employee/{id}/update'); //store employee
Route::delete('/employee/{id}/delete'); //delete employee