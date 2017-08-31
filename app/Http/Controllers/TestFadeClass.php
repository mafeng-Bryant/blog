<?php

namespace  App\Http\Controllers;

use Illuminate\Support\Facades\Facade;

class TestFadeClass extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'test';
    }

}
