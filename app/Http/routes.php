<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::auth();

// Route::get('/home', 'HomeController@index');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/user', 'UserController@index');
    Route::get('/user/{id}/edit', 'UserController@edit');
    Route::put('/user/{id}', 'UserController@update');
    Route::delete('user/{id}', 'UserController@destroy');
    Route::get('/ticket-type', 'TicketTypeController@index');
    Route::get('/ticket-type/create', 'TicketTypeController@create');
    Route::post('/ticket-type', 'TicketTypeController@store');

});


