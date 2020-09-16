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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * API routes for Users Management
 */

 //list all users
Route::get('/users', 'UserController@index');

//view user details
Route::get('/users/{id}', 'UserController@view');

//delete a user
Route::delete('/users/{id}', 'UserController@delete');

//create new user
Route::post('/users', 'UserController@create');

Route::put('/users/{id}', 'UserController@update');

Route::get('/secrets', 'SecretController@index');

// Route::fallback(function () {
// return response()->json([
//         'message' => 'The requested resource was not found.'
//     ], 404);
// });