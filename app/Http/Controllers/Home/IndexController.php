<?php

namespace App\Http\Controllers\Home;


use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;

class IndexController extends CommonController
{

    public  function  info(){

       dd(11111);

    }

    public function index()
    {

        dd(111);
//        //点击量最高的六篇文章(站长推荐)
//        $pics = Article::orderBy('article_view','desc')->take(6)->get();
//
//
//        //图文列表，带分页
//        $data = Article::orderBy('article_time','desc')->paginate(5);
//
//        //友情链接
//        $links = Links::orderBy('link_order','asc')->get();
//
//        return view('home.index',compact('pics','hot','new','data','links'));
    }

    public function cate($category_id)
    {
        //图文列表，带分页
        $data = Article::where('category_id',$category_id)->orderBy('article_time','desc')->paginate(4);

        $field =  Category::find($category_id);

        Category::where('category_id','=',$category_id)->increment('category_view');

        //当前分类的子分类
        $subCategory = Category::where('category_pid',$category_id)->get();

        return view('home.list',compact('field','data','subCategory'));

    }

    public function article($article_id)
    {
        $field = Article::join('blog_category','blog_article.category_id','=','blog_category.category_id')->where('blog_article.article_id',$article_id)->first();

        Article::where('article_id','=',$article_id)->increment('article_view');

        $article['pre'] = Article::where('article_id','<',$article_id)->orderBy('article_id','desc')->first();

        $article['next'] = Article::where('article_id','>',$article_id)->orderBy('article_id','asc')->first();

        $data = Article::where('category_id',$field->category_id)->orderBy('article_id','desc')->take(6)->get();

        return view('home.new',compact('field','article','data'));
    }


}
