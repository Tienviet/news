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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::prefix('users')->group(function () {
////        Route::resource('/', 'Api\UserAPIController',['middleware' => ['checkPermission:list-user']]);
//    Route::resource('/', 'Api\UserAPIController');
//});
Route::get('/users', 'Api\UserAPIController@index');
Route::get('/users/{id}/edit', 'Api\UserAPIController@edit');
Route::get('/users/role/{id}', 'Api\UserAPIController@getRoleId');
Route::prefix('roles')->group(function () {
    Route::resource('/', 'Api\RoleAPIController');
});
Route::prefix('permissions')->group(function () {
    Route::resource('/', 'Api\PermissionAPIController');
});

Route::post('/register', 'Api\AuthAPIController@register');
Route::post('/login', 'Api\AuthAPIController@login');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'Api\AuthAPIController@logout');
});

Route::apiResource('/category','Api\CategoryAPIController');
