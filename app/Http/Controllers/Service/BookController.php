<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2017/10/19
 * Time: 15:41
 */

namespace App\Http\Controllers\Service;

use App\Entity\Category;
use App\Http\Controllers\ApiController;
use App\Models\M3Result;

class BookController extends ApiController
{
    public function getCategoryByParentId($parent_id = '')
    {
      if ($parent_id ==0){
          $parent_id = null;
      }
      $categorys = Category::where('parent_id',$parent_id)->get();
      $m3_result = new M3Result();
      $m3_result->status = 0;
      $m3_result->message = "成功";
      $m3_result->categorys = $categorys;
      return $m3_result->toJson();
    }







}
