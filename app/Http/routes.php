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
    return 'Welcome';
});


Route::get('login','View\MemberController@toLogin');

Route::any('register','View\MemberController@toRegister');

Route::any('createCode','Service\ValidateController@create');

Route::any('sendSMS','Service\ValidateController@sendSMS');

Route::post('call_register','View\MemberController@registerAction');

Route::get('validate_email','View\MemberController@validateEmail');

Route::post('loginAction','View\MemberController@loginAction');

Route::get('category','View\BookController@toCategory');//分类页面

Route::get('category/parent_id/{parent_id}','Service\BookController@getCategoryByParentId');//分类数据

Route::get('product/category_id/{category_id}','View\BookController@toProduct');

Route::get('product/{product_id}','View\BookController@toProductContent');

