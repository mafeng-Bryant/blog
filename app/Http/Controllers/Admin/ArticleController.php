<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{

    //admin.article.index 全部分章列表
    public  function  index()
    {
        $data =   Article::orderBy('article_id','desc')->paginate(10);;
        return view('admin.article.index',compact('data'));
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


    //post admin/article 添加文章表单提交方法
    public function  store()
    {

        $input = Input::except('_token');
        $input['article_time'] = time();


        $rules = [
            'article_title'=>'required',
            'article_content'=>'required',

        ];

        $message = [
            'article_title.required'=>'文章标题不能为空',
            'article_content.required'=>'文章内容不能为空',

        ];

        $validator = Validator::make($input,$rules,$message);

        if ($validator->passes()) {

            $result = Article::create($input);

            if ($result){
                return redirect('admin/article');
            }else {
                return back()->with('errors','数据填充失败，请稍后重试!') ;
            }


        }else {
            return back()->withErrors($validator);
        }

    }

    public  function edit($article_id)
    {
        $all_category = Category::all();
        $data = $this->getTree($all_category);
        $field = Article::find($article_id);
        return view('admin.article.edit',compact('data','field'));
    }

    //put admin.article.update //更新分类
    public  function update($article_id)
    {
        $input = Input::except('_token','_method');
        $result = Article::where('article_id',$article_id)->update($input);
        if ($result){
            return redirect('admin/article');
        }else {
            return back()->with('errors','文章信息更新失败，请稍后重试！');
        }
    }

    //Delete admin.article.destroy
    public  function destroy($article_id)
    {
        $result = Article::where('article_id',$article_id)->delete();
        if ($result) {
            $data = [
                'status'=>200,
                'msg'=>"分类删除成功!",
            ];
        }else {
            $data = [
                'status'=>404,
                'msg'=>"分类删除成失败!",
            ];
        }
        return $data;
    }



}
