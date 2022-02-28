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
Route::get('/employee/{id}/show', 'HomeController@show')->name('show'); //show employee
Route::get('/employee/add', 'HomeController@add')->name('add'); //add employee
Route::get('/employee/{id}/edit', 'HomeController@edit')->name('edit'); //edit employee
Route::post('/employee/store', 'HomeController@store')->name('store'); //store employee
Route::put('/employee/{id}/update', 'HomeController@update')->name('update'); //update employee
Route::delete('/employee/{id}/delete', 'HomeController@delete')->name('delete'); //delete employee

Route::post('/employee-movement/store', 'EmployeeMovementController@store')->name('store-movement');