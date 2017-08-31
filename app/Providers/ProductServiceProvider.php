<?php

namespace App\Providers;

use App\Http\Controllers\Test;
use App\Http\Controllers\TestService;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('test',function(){
//            return new TestService();
            return new Test();
        });

        //使用bind绑定实例到接口以便依赖注入
        $this->app->bind('App\Http\Controllers\TestService',function(){
            return new TestService();
        });
    }
}
