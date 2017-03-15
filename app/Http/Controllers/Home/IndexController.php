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


        //图文列表，带分页
        $data = Article::orderBy('article_time','desc')->paginate(5);

        //友情链接
        $links = Links::orderBy('link_order','asc')->get();

        return view('home.index',compact('pics','hot','new','data','links'));
    }

    public function cate($category_id)
    {
        //图文列表，带分页
        $data = Article::where('category_id',$category_id)->orderBy('article_time','desc')->paginate(4);

        $field =  Category::find($category_id);

        //当前分类的子分类
        $subCategory = Category::where('category_pid',$category_id)->get();

        return view('home.list',compact('field','data','subCategory'));

    }

    public function article()
    {
        return view('home.new');
    }


}
