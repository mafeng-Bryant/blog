<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //view share
        view()->share('sitename','laravel学院');

        //视图composer
        view()->composer(['hello','One'],function ($view){
          $view->with('user',array('name'=>'test','avator'=>'/path/to/test.jpg'));
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
