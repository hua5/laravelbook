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
// the three is static page
    Route::get('/','StaticPagesController@home')->name('home');
    Route::get('/help','StaticPagesController@help')->name('help');
    Route::get('/about','StaticPagesController@about')->name('about');
//user  controller

    Route::get('signup','UsersController@create')->name('signup');

    Route::resource('users', 'UsersController');

//session controller
    Route::get('login','SessionsController@create')->name('login');
    Route::post('login','SessionsController@store')->name('login');
    Route::delete('logout','SessionsController@destroy')->name('logout');

    



