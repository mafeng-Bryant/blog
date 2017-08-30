<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    protected $test;

    //依赖注入
    public function __construct(TestContract $test)
    {
      $this->test = $test;
    }

    public function index()
    {
        dd(3);
      $this->test->callMe('TestConteoller');

    }

}
