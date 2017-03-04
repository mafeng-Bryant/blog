<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\Category;

class ArticleController extends CommonController
{
    //

//|        | GET|HEAD                       | admin/article                  | admin.article.index    | App\Http\Controllers\Admin\ArticleController@index         | web,admin.login |
//|        | POST                           | admin/article                  | admin.article.store    | App\Http\Controllers\Admin\ArticleController@store         | web,admin.login |
//|        | GET|HEAD                       | admin/article/create           | admin.article.create   | App\Http\Controllers\Admin\ArticleController@create        | web,admin.login |
//|        | DELETE                         | admin/article/{article}        | admin.article.destroy  | App\Http\Controllers\Admin\ArticleController@destroy       | web,admin.login |
//|        | GET|HEAD                       | admin/article/{article}        | admin.article.show     | App\Http\Controllers\Admin\ArticleController@show          | web,admin.login |
//|        | PUT|PATCH                      | admin/article/{article}        | admin.article.update   | App\Http\Controllers\Admin\ArticleController@update        | web,admin.login |
//|        | GET|HEAD                       | admin/article/{article}/edit   | admin.article.edit

    //admin.article.index 全部分章列表
    public  function  index()
    {


    }

    //get admin/article/create 添加文章
    public  function create()
    {
        $all_category = Category::all();
        $data = $this->getTree($all_category);
        return view('admin.article.add',compact('data'));
    }

    public function getTree($data)
    {
        $arr =array();
        foreach ($data as $k=>$v){
            if ($v->category_pid ==0){
                $arr[] = $data[$k];
                foreach ($data as $m=>$n){
                    if ($n->category_pid == $v->category_id) {
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        return $arr;
    }










}
