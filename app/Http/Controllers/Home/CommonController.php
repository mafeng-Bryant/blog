<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Navs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;


class CommonController extends Controller
{
    //
    public function __construct()
    {

        //点击量最高的5篇文章
        $hot = Article::orderBy('article_view','desc')->take(5)->get();

        //最新发布的八篇文章
        $new = Article::orderBy('article_time','desc')->take(8)->get();

        $navs =  Navs::all();

        View::share('navs',$navs);
        View::share('hot',$hot);
        View::share('new',$new);


    }


}
