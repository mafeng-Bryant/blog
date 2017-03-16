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


Route::group(['middleware' => ['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'],function (){

    Route::get('info','IndexController@info');

    Route::get('/','IndexController@index');

    Route::get('quit','LoginController@quit');

    Route::any('pass','IndexController@pass');

    Route::resource('category','CategoryController');

    Route::resource('article','ArticleController');

    Route::post('cate/changeorder','CategoryController@changerOrder');

    Route::any('upload','CommonController@upload');

    Route::resource('links','LinksController');

    Route::post('links/changeorder','LinksController@changerOrder');

    Route::resource('navs','NavsController');

    Route::post('navs/changeorder','NavsController@changerOrder');

    Route::resource('config','ConfigController');

    Route::post('config/changecontent','ConfigController@changerContent');

    Route::post('config/changeorder','ConfigController@changerOrder');

    Route::get('putfile','ConfigController@writeConfigFile');



});


Route::group(['middleware' => ['web']],function (){

//    Route::get('/', function () {
//        return view('welcome');
//    });

    Route::get('/','Home\IndexController@index');

    Route::get('/cate/{category_id}','Home\IndexController@cate');

    Route::get('/a/{article_id}','Home\IndexController@article');

    Route::any('admin/login','Admin\LoginController@login');
    Route::get('admin/code','Admin\LoginController@code');
    Route::get('admin/crypt','Admin\LoginController@crypt');

});








