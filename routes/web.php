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


Route::get('/','UserController@showloginform');
Route::post('login','UserController@login');
Route::get('dashboard','UserController@dashboard')->middleware('loggedIn');
Route::group(['middleware'=>'check_user_ogin'],function(){
    Route::get('userList','UserController@userDetails');
    Route::get('editUser/{row_id}','UserController@editUser');
    Route::post('updateData/{row_id}','UserController@updateData');
    Route::get('deleteData/{id}','UserController@deleteUser');
    Route::get('logout','UserController@logout');
});
Route::get('register','UserController@register');
Route::post('saveData','UserController@saveData');