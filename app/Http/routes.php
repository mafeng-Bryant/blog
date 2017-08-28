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
});

Route::get('info/{id}','MemberController@info');

Route::get('info','StudentController@info');

Route::get('index','IndexController@index');

Route::get('query3','StudentController@query3');

Route::get('query2','StudentController@query2');

Route::get('query','StudentController@query');

Route::get('orm1','StudentController@orm1');

Route::get('orm2','StudentController@orm2');

Route::get('orm3','StudentController@orm3');

Route::get('url',['as'=>'url','uses'=>'StudentController@urlTest']);

Route::get('request1',['uses'=>'StudentController@request1']);

Route::get('cache1',['uses'=>'StudentController@cache1']);

Route::get('cache2',['uses'=>'StudentController@cache2']);

Route::get('error',['uses'=>'StudentController@error']);

Route::get('queue',['uses'=>'StudentController@queue']);

Route::get('queue',['uses'=>'StudentController@queue']);

Route::get('mail',['uses'=>'StudentController@mail']);

Route::any('upload',['uses'=>'StudentController@upload']);

Route::get('hello/{name}',['uses'=>'StudentController@helloName']);
//->where('name','[A-Za-z]+');


Route::get('pp',['as'=>'mafengma',function (){
   return 'hello laravel';
}]);

Route::get('testNameRoute',function (){
    return redirect()->route('mafengma');
//  return route('mafengma');
});

//路由组
Route::group(['middleware' => 'test'],function (){

 Route::get('write/laravel',function (){
     //使用test中间件
     dd('write/laravel');
 });

  Route::get('update/laravel',function (){
      //使用test中间件
      dd('update/laravel');
  });

});

Route::get('age/refuse',['as' => 'refuse',function (){

    return '未成年人禁止入内';

}]);


Route::group(['namespace' => 'API','prefix' => 'V1.3'], function(){
    // 控制器在 "App\Http\Controllers\API" 命名空间下

    Route::get('testma',['uses' => 'TestController@test']);

});


Route::get('testCsrf',function (){
//    $csfr_field = csrf_field();
//    {$csfr_field}
    $html = <<<GET
   <form method="POST" action="/testCsrf">
    <input type="submit" value="Test"/>
</form>
GET;
  return $html;
});


Route::post('testCsrf',function (){

    return 'Success!';
});

Route::resource('post','PostController');

Route::controller('request','RequestController');

Route::get('testResponse',function (){

    $content = 'Hello laravel';
    $status = 500;
    $value = 'text/html;charset=utf-8';
    return response($content,$status)->headers('Content-Type',$value);
   // return (new \Illuminate\Http\Response($content,$status))->header('Content-Type',$value);

});


Route::get('testResponseView',function (){

   $value = 'text/html; charset=utf-8';
    $data = ['message'=> 'hello response view','title'=>'test'];
   return response()->view('hello',$data)
        ->header('Content-Type',$value);

});

Route::get('testResponseJson',function(){
    $data = ['message'=> 'hello response view','title'=>'test'];
    return response()->json($data)->setCallback(request()->input('callback'));
});

//文件下载

Route::get('testDownLoad',function (){

    $path = realpath(base_path('public/uploads')).'/20170304194325541.jpeg';
   return response()->download($path,'ma.jpg');

});

Route::get('testViewHello',function(){
    return view('hello');
});

Route::get('testViewHome',function(){
    return view('One');
});
















/*
Route::group(['middleware' => ['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'],function (){

    Route::get('info','IndexController@info');

    Route::get('/','IndexController@index');

    Route::get('quit','LoginController@quit');

    Route::any('pass','IndexController@pass');

    Route::resource('category','CategoryController');

    Route::resource('article','ArticleController');

    Route::post('cate/changeorder','CategoryController@changerOrder');

    Route::any('upload','CommonController@upload');

    Route::resoupwdrce('links','LinksController');

    Route::post('links/changeorder','LinksController@changerOrder');

    Route::resource('navs','NavsController');

    Route::post('navs/changeorder','NavsController@changerOrder');

    Route::resource('config','ConfigController');

    Route::post('config/changecontent','ConfigController@changerContent');

    Route::post('config/changeorder','ConfigController@changerOrder');

    Route::get('putfile','ConfigController@writeConfigFile');

});


Route::group(['middleware' => ['web']],function (){

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/','Home\IndexController@index');

    Route::get('/cate/{category_id}','Home\IndexController@cate');

    Route::get('/a/{article_id}','Home\IndexController@article');

    Route::any('admin/login','Admin\LoginController@login');
    Route::get('admin/code','Admin\LoginController@code');
    Route::get('admin/crypt','Admin\LoginController@crypt');

});

*/


Route::auth();

Route::get('home', 'HomeController@index');
