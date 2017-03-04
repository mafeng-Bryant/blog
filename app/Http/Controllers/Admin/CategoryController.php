<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends CommonController
{
    //get admin/category

    public  function  index()
    {
        $all_category = Category::all();
        $data = $this->getTree($all_category);
        return view('admin.category.index')->with('data',$data);
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

    private function  getTopCategory($data){
        $arr =array();
        foreach ($data as $k=>$v){
            if ($v->category_pid == 0){
                $arr[] = $data[$k];
            }
        }
      return $arr;
    }

    public function  changerOrder(){

        $input = Input::all();
        $category = Category::find($input['category_id']);
        $category->category_order = $input['category_order'];
        $re = $category->update();
        if ($re){
            $data = [
                'status' =>0,
                'msg' => '分类排序成功',
            ];

       }else {
            $data = [
                'status' =>1,
                'msg' => '分类排序失败！',
            ];
        }
        return $data;
    }


    //get admin.category.create
    public  function create()
    {
        $all_category = Category::all();
        $data = $this->getTopCategory($all_category);
        return view('admin/category/add',compact('data'));
    }

    //post admin/category 添加表单提交方法
    public function  store()
    {

        if ($input = Input::except("_token")){


            $rules = [
                'category_name'=>'required',
            ];

            $message = [
                'category_name.required'=>'分类名称不能为空',
            ];

            $validator = Validator::make($input,$rules,$message);

            if ($validator->passes())  {
            $result = Category::create($input);
            if ($result){
              return redirect('admin/category');
            }else {
              return back()->with('errors','数据填充失败，请稍后重试!') ;
            }

            }else {
                return back()->withErrors($validator);
            }

        }else {
            return view('admin.pass');

        }

    }

    //get admin.category..edit
    public  function edit($category_id)
    {
        $field = Category::find($category_id);
        $all_category = Category::all();
        $data = $this->getTopCategory($all_category);
        return view('admin.category.edit',compact('field','data'));
    }

    //put admin.category.update //更新分类
    public  function update($category_id)
    {
        $input = Input::except('_token','_method');
        $result = Category::where('category_id',$category_id)->update($input);
        if ($result){
          return redirect('admin/category');
        }else {
          return back()->with('errors','分类信息更新失败，请稍后重试！');
        }
    }


    //Delete admin.category.destroy
    public  function destroy($category_id)
    {
        $result = Category::where('category_id',$category_id)->delete();//如果删除的是父类，子类全部更新为父类
        Category::where('category_pid',$category_id)->update(['category_pid'=>0]);
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

    //get admin/category/{show}
    public  function show(){




    }

}
