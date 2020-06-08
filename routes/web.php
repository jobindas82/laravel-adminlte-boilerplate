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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    //Dashboard
    Route::get('/', function () {
        return view('dashboard/index');
    });

    //user crud
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', ['as' => 'user.list', 'uses' => 'UserController@index']);
        Route::get('/create', ['as' => 'user.create', 'uses' => 'UserController@create']);
        Route::post('/create', ['as' => 'user.save', 'uses' => 'UserController@save']);
        Route::post('/status', ['as' => 'user.status', 'uses' => 'UserController@status']);
    });

});

