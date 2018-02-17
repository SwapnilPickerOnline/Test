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

 


Route::get('/', 'WebController@employees_list');

Route::get('/all_employee', 'WebController@all_employee');

Route::get('/employees_with_department', 'WebController@employees_with_department');

Route::get('/employees_list', 'WebController@employees_list');