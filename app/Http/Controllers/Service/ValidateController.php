<?php

/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2017/10/17
 * Time: 15:28
 */
namespace APP\Http\Controllers\Service;

use App\Entity\TempPhone;
use App\Http\Controllers\ApiController;
use App\Models\M3Result;
use App\Tools\SMS\SendTemplateSMS;
use App\Tools\Code\ValidateCode;
use Illuminate\Http\Request;

class ValidateController extends ApiController
{
  public function create(Request $request)
  {
    $code = new ValidateCode();
//    $request->session()->put('validate_code',$code->getCode());
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

      if (strlen($telphone) !='11' || $telphone[0] !='1'){
          $result->status = 2;
          $result->message='手机号格式不对';
          return $result->toJson();
      }

      $charset = '1234567890';
      $code = '';
      $_len = strlen($charset)-1;
      for ($i=0;$i<6;++$i){
          $code.=$charset[mt_rand(0,$_len)];
      }
      $sendSMS = new SendTemplateSMS();
      $m3_result = $sendSMS->sendTemplateSMS($telphone,array($code,60),1);
      if ($m3_result->status == 0){
          $tel_phone = TempPhone::where('phone',$telphone)->first();
          if ($tel_phone==null){
              $tel_phone = new TempPhone();
          }
          $tel_phone->phone = $telphone;
          $tel_phone->code = $code;
          $tel_phone->deadline = date('Y-m-d H-i-s',time()+60*60);
          $tel_phone->save();
      }
      return $m3_result->toJson();

  }


}