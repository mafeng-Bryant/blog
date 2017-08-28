<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RequestController extends Controller
{
    //
    public function  getBasetest(Request $request)
    {
      $input = $request->input('test');
      echo  $input;
    }


    public function getUrl(Request $request)
    {
      if (!$request->is('request/*')){
          abort(404);
      }
      $uri = $request->path();
      $url = $request->url();
      echo  $uri;
      echo  '<br>';
      echo  $url;
    }

    public function  getInputData(Request $request){
        //获取GET方式传递的name参数，默认为LaravelAcademy
        $name = $request->input('name','LaravelAcademy');
        echo $name;
        echo '<br>';
        echo $request->input('test.0.name');
    }











}
