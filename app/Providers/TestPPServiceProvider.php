<?php

namespace App\Providers;

use App\Http\Controllers\TestService;
use Illuminate\Support\ServiceProvider;

class TestPPServiceProvider extends ServiceProvider
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
        dd(333);
        //
         $this->app->singleton('test',function (){
             return new TestService();
         });

        $this->app->bind('App\Http\Controllers\TestContract',function (){
           return new TestService();
        });


    }
}
