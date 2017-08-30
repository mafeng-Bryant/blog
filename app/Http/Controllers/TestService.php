<?php

namespace App\Http\Controllers;


class TestService implements TestContract
{

   public function callMe($controller)
   {
      dd('Call Me From TestServiceProvider In '.$controller);

   }


}

