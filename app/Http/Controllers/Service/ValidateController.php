<?php

/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2017/10/17
 * Time: 15:28
 */
namespace APP\Http\Controllers\Service;

use App\Entity\TempPhone;
use App\Http\Controllers\Controller;
use App\Models\M3Result;
use App\Tools\SMS\SendTemplateSMS;
use App\Tools\Code\ValidateCode;
use Illuminate\Http\Request;

class ValidateController extends Controller
{
  public function create($value='')
  {
    $code = new ValidateCode();
    return $code->doimg();
  }

  public function sendSMS(Request $request)
  {
      $result = new M3Result();
      $telphone = $request->input('phone','');
      if (empty($telphone) || $telphone==''){
       $result->status = 1;
       $result->message='手机号不能为空';
       return $result->toJson();
      }


      $charset = '1234567890';
      $code = '';
      $_len = strlen($charset)-1;
      for ($i=0;$i<6;++$i){
          $code.=$charset[mt_rand(0,$_len)];
      }
      $sendSMS = new SendTemplateSMS();
      $sendSMS->sendTemplateSMS('13632506227',array($code,60),1);


      $phone = new TempPhone();
      $phone->phone = $telphone;
      $phone->code = $code;
      $phone->deadline = date('Y-m-d H-i-s',time()+60*60);
      $phone->save();

      $result->status =0;
      $result->message='发送成功';

      return $code;

  }


}