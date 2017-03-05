<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\Navs;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NavsController extends CommonController
{

    //全部友情链接列表
  public  function  index(){

      $data = Navs::orderBy('link_order','asc')->get();
      return view('admin.navs.index',compact('data'));
  }

    public function  changerOrder(){

        $input = Input::all();
        $link = Navs::find($input['nav_id']);
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
        return view('admin/navs/add');
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
                $result = Navs::create($input);
                if ($result){
                    return redirect('admin/navs');
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

    public  function edit($nav_id)
    {
        $field = Navs::find($nav_id);
        return view('admin.navs.edit',compact('field'));
    }


    public  function update($nav_id)
    {
        $input = Input::except('_token','_method');
        $result = Navs::where('nav_id',$nav_id)->update($input);
        if ($result){
            return redirect('admin/navs');
        }else {
            return back()->with('errors','友情链接信息更新失败，请稍后重试！');
        }
    }

    public  function destroy($nav_id)
    {
        $result = Navs::where('nav_id',$nav_id)->delete();
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
