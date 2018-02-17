<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 
Route::get('/list-employee', 'API\EmployeeController@index'); 
Route::get('/list-active-employee', 'API\EmployeeController@active_employee'); 
Route::post('/create-employee', 'API\EmployeeController@create');
Route::post('/update-employee/{id}', 'API\EmployeeController@update');
Route::delete('/delete-employee/{id}', 'API\EmployeeController@remove');

Route::get('/list-department', 'API\DepartmentController@index');   
Route::post('/create-department', 'API\DepartmentController@create');
Route::post('/update-department/{id}', 'API\DepartmentController@update');
Route::delete('/delete-department/{id}', 'API\DepartmentController@remove');
