<?php

namespace  App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class TestController extends  Controller {

   public  function  test(){

      return view('student.csrf');

   }







}