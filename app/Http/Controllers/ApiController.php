<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2017/10/18
 * Time: 15:09
 */

namespace App\Http\Controllers;

class ApiController extends Controller
{
    protected  $parameter = [];
    protected  $request = null;

    function __construct()
    {
//      $p = request()->input('data');
//      $temp = json_decode($p,true);
//      $this->parameter = $temp;
      $this->request = request();
    }





}