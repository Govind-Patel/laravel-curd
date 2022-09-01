<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testApi;
use App\Http\Controllers\DeviceController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('data',[testApi::class,'getData']);
// Route::get('data','testApi@getData');
Route::get('list','DeviceController@list');
Route::post('addData','DeviceController@addData');
Route::put('update','DeviceController@updateData');
Route::get('delete/{id}','DeviceController@delete');
Route::get('srearch/{name}','DeviceController@srearch');
