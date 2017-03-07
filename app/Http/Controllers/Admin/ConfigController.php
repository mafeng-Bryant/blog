<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ConfigController extends CommonController
{


  public  function  index()
  {
      $data = Config::orderBy('config_order','asc')->get();
      return view('admin.config.index',compact('data'));
  }

    public function  changerOrder(){

        $input = Input::all();
        $nav = Config::find($input['config_id']);
        $nav->nav_order = $input['config_order'];
        $re = $nav->update();
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
        return view('admin/config/add');
    }

    //提交表单
    public function  store()
    {

        if ($input = Input::except("_token"))
        {
            $rules = [
                'config_name'=>'required',
                'config_title'=>'required',
            ];

            $message = [
                'config_name.required'=>'配置项名称不能为空！',
                'config_title.required'=>'配置项标题不能为空！',
            ];

            $validator = Validator::make($input,$rules,$message);

            if ($validator->passes())  {
                $result = Config::create($input);
                if ($result){
                    return redirect('admin/config');
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
        $field = Config::find($nav_id);
        return view('admin.config.edit',compact('field'));
    }


    public  function update($nav_id)
    {
        $input = Input::except('_token','_method');
        $result = Config::where('config_id',$nav_id)->update($input);
        if ($result){
            return redirect('admin/config');
        }else {
            return back()->with('errors','友情链接信息更新失败，请稍后重试！');
        }
    }

    public  function destroy($nav_id)
    {
        $result = Config::where('config_id',$nav_id)->delete();
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
