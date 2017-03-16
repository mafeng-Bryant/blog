<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once "Code/Code.class.php";

class LoginController extends CommonController
{
    public function login()
    {

        if ($input = Input::all()){

            $code = new \Code;
            $_code = $code->get();
            if (strtoupper($_code) != strtoupper($input['code'])){
                return back()->with('msg','验证码错误');
            }
            $user = User::first();
            if ($user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass) != $input['user_pass']){
                return back()->with('msg','用户名或者密码错误');
            }

            //login success
            session(['user' => $user]);
            //后台欢迎页面
           return redirect('admin');

        }else {

            return view('admin.login');
        }
    }

    public function  code(){
        $code = new \Code;
        $code->make();
    }

    public  function  quit(){

      session(['user'=>null]);
     return redirect('admin/login');

    }

    //加密方法
    public  function  crypt(){
        $str = '111111';
        $crypt = Crypt::encrypt($str);
        echo  $crypt;
    }


}
