<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('stuff', 'ApiController@get_all_stuff');
Route::post('stuff', 'ApiController@insert_data_stuff');
Route::put('stuff/{stuff_code}', 'ApiController@update_data_stuff' );
Route::delete('stuff/{stuff_code}', 'ApiController@delete_data_stuff' );

// Category
Route::get('category', 'CategoryStuffController@get_all_category_stuff');
Route::post('category', 'CategoryStuffController@insert_data_category_stuff');
Route::put("category/{id}",'CategoryStuffController@update_data_category_stuff');
Route::delete("category/{id}", 'CategoryStuffController@delete_data_category_stuff');