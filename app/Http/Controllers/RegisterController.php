<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieUsers;
use Illuminate\Support\Facades\Crypt;
class RegisterController extends Controller
{
    public function index(Request $req)
    {
      
        $user= MovieUsers::Register($req); 
        if ($user=="inserted successfully"){
            return view('HomePage',['success'=>1]);
        }
        return view('Register',[
            'exception'=>$user
        ]);
        

        // $user->name=$req->input()
    }
}
