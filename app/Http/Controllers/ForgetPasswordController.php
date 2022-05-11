<?php

namespace App\Http\Controllers;

use App\Models\MovieUsers;
use Illuminate\Http\Request;


class ForgetPasswordController extends Controller
{
   /**
    * Function to get the verification details
    * @param string Request from user
    * @return return to view pages based on result
    **/
   public function index(Request $req)
   {
      $result = MovieUsers::forgetPassword($req);

      if (!$result) {
         
         return view('ForgetPassword', [
            'notVerified' => 1
         ]);
      }

      return redirect('/changePassword/' . $result);
   }
}
