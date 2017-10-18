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
    return view('Welcome');
});


Route::get('login','View\MemberController@toLogin');

Route::any('register','View\MemberController@toRegister');

Route::any('createCode','Service\ValidateController@create');

Route::any('sendSMS','Service\ValidateController@sendSMS');

Route::post('call_register','View\MemberController@registerAction');

