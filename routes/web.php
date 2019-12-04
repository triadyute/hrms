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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user', 'UserController@index')->middleware('auth')->name('user.index');
Route::get('user/create', 'UserController@create')->middleware('auth')->name('user.create');
Route::post('user', 'UserController@store')->middleware('auth')->name('user.store');
Route::get('user/{user}', 'UserController@show')->middleware('auth')->name('user.show');
Route::get('user/{user}/edit', 'UserController@edit')->middleware('auth')->name('user.edit');
Route::put('user/{user}', 'UserController@update')->middleware('auth')->name('user.update');
Route::delete('user/{user}', 'UserController@destroy')->middleware('auth')->name('user.destroy');
Route::resource('department', 'DepartmentController')->middleware('auth');
Route::get('leave', 'LeaveController@index')->name('leave.index')->middleware('auth');
Route::get('leave/requests', 'LeaveController@view_leave_requests')->name('leave.requests')->middleware('auth');
Route::get('employee-profile/{employeeProfile}/edit', 'EmployeeProfileController@edit')->name('employee-profile.edit')->middleware('auth');
Route::post('/user/search-results', 'UserController@results')->name('user.results')->middleware('auth');