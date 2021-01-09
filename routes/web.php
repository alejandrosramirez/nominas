<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/employee', 'EmployeeController@all')->name('employee.all');

Route::get('/employee/form', 'EmployeeController@employeeCreateForm')->name('employee.form');
Route::post('/employee/create', 'EmployeeController@create')->name('employee.create');

Route::get('/employee/detail/{id}', 'EmployeeController@detail')->name('employee.detail');

Route::get('/employee/editform/{id}', 'EmployeeController@employeeEditForm')->name('employee.editform');
Route::post('/employee/update/{id}', 'EmployeeController@update')->name('employee.update');

Route::get('/employee/changestate/{id}', 'EmployeeController@changeState')->name('employee.changestate');

Route::get('/employee/delete/{id}', 'EmployeeController@delete')->name('employee.delete');
