<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieUsers;
use Illuminate\Support\Facades\Crypt;
class LoginController extends Controller
{
    public function index(Request $req)
    {
      
      $user= MovieUsers::Login($req); 
      
      if($user=="username doesnot exist")
      {
          return view('HomePage',['NotAUser'=>1]);
      }
      if($user=="failure")
      {
       return view('HomePage',['incorrect_pass'=>1]);
      }
    if($user->AdminAccess==1)  
   { $array=[
     'access'=>1
   ];
     return redirect('/MovieView/1');  
   }  
   else
   return redirect('/MovieView/0');
  }
}
// $user=MovieUsers::where('name',$req->input('Uname'))->first();
   
// if(Crypt::decryptString($user->password)==$req->input('Pass')){
//     return "success";
// }
// return "failure";