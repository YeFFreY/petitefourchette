<?php

use Illuminate\Support\Facades\Auth;
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



Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('employees', 'EmployeesController');
    Route::resource('equipments', 'EquipmentsController');
    Route::resource('cashbooks', 'CashBookController');

    Route::post('employees/{employee}/evaluations', 'EmployeeEvaluationsController@store');
    Route::get('employees/{employee}/evaluations/create', 'EmployeeEvaluationsController@create');
    Route::delete('evaluations/{evaluation}', 'EmployeeEvaluationsController@destroy');
    Route::get('evaluations/{evaluation}/edit', 'EmployeeEvaluationsController@edit');
    Route::patch('evaluations/{evaluation}', 'EmployeeEvaluationsController@update');
});
