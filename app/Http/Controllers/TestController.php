<?php

namespace App\Http\Controllers;


class TestController extends Controller
{
    protected $test;

    //依赖注入
    public function __construct(TestService $test)
    {
      $this->test = $test;
    }

    public function index()
    {
//      $this->test->callMe('TestConteoller');
        TestFadeClass::doSomething();

    }

}
