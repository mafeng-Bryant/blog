<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

use App\Http\Requests;

class MemberController extends Controller
{
    //
  public function  info($id)
  {

      return view('info',[
        'name' => 'mafeng',
         'age' =>18
      ]);
      // return Member::getMember();
     // return 'member-'.$id;
     // return view('member/member-info');

  }


}
