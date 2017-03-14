<?php

namespace App\Http\Controllers\Home;


use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;

class IndexController extends CommonController
{

    public function index()
    {
        //点击量最高的六篇文章(站长推荐)
        $pics = Article::orderBy('article_view','desc')->take(6)->get();

        //点击量最高的5篇文章
        $hot = Article::orderBy('article_view','desc')->take(5)->get();


        //最新发布的八篇文章
        $new = Article::orderBy('article_time','desc')->take(8)->get();

        //图文列表，带分页
        $data = Article::orderBy('article_time','desc')->paginate(5);

        //友情链接
        $links = Links::orderBy('link_order','asc')->get();

        return view('home.index',compact('pics','hot','new','data','links'));
    }

    public function cate($category_id)
    {
        $field =  Category::find($category_id);
        return view('home.list',compact('field'));
    }

    public function article()
    {
        return view('home.new');
    }


}
