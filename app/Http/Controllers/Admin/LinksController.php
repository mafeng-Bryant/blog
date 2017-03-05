<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\Links;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinksController extends CommonController
{

    //全部友情链接列表
  public  function  index(){

      $data = Links::orderBy('link_order','asc')->get();
      return view('admin.links.index',compact('data'));
  }

    public function  changerOrder(){

        $input = Input::all();
        $link = Links::find($input['link_id']);
        $link->link_order = $input['link_order'];
        $re = $link->update();
        if ($re){
            $data = [
                'status' =>0,
                'msg' => '友情链接排序成功',
            ];

        }else {
            $data = [
                'status' =>1,
                'msg' => '友情链接排序失败！',
            ];
        }
        return $data;
    }


    public  function show(){



    }

    //添加友情链接
    public  function create()
    {
        return view('admin/links/add');
    }

    //提交表单
    public function  store()
    {
        if ($input = Input::except("_token")){

            $rules = [
                'link_name'=>'required',
                'link_url'=>'required'
            ];

            $message = [
                'link_name.required'=>'友情链接名称不能为空',
                'link_url.required'=>'友情链接地址不能为空',
            ];

            $validator = Validator::make($input,$rules,$message);

            if ($validator->passes())  {
                $result = Links::create($input);
                if ($result){
                    return redirect('admin/links');
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

    //get admin.links.edit 编辑友情链接
    public  function edit($link_id)
    {
        $field = Links::find($link_id);
        return view('admin.links.edit',compact('field'));
    }


    //put admin.links.update //更新友情链接
    public  function update($link_id)
    {
        $input = Input::except('_token','_method');
        $result = Links::where('link_id',$link_id)->update($input);
        if ($result){
            return redirect('admin/links');
        }else {
            return back()->with('errors','友情链接信息更新失败，请稍后重试！');
        }
    }

    public  function destroy($link_id)
    {
        $result = Links::where('link_id',$link_id)->delete();
        if ($result) {
            $data = [
                'status'=>200,
                'msg'=>"友情链接删除成功!",
            ];
        }else {
            $data = [
                'status'=>404,
                'msg'=>"友情链接删除成失败!",
            ];
        }
        return $data;
    }

}
