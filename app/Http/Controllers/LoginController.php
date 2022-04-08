<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieUsers;
use App\Models\MovieDetail;
use Illuminate\Support\Facades\Crypt;
class LoginController extends Controller
{
    public function index(Request $req)
    {
      $movie=MovieDetail::all();
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
     return view('MovieView',['access'=>1,'movies'=>$movie,'search'=>1]);  
   }  
   else
   return view('MovieView',['movies'=>$movie,'search'=>1]);
  }
}
// $user=MovieUsers::where('name',$req->input('Uname'))->first();
   
// if(Crypt::decryptString($user->password)==$req->input('Pass')){
//     return "success";
// }
// return "failure";