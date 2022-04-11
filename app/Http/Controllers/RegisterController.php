<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieUsers;
use Illuminate\Support\Facades\Crypt;
class RegisterController extends Controller
{

   /**
     * Function to get the user details for registration
     * @param string Request from user through request form
     * @return  redirect to login page with alerts
     **/
    public function index(Request $req) {
      
        $user = MovieUsers::Register($req); 
        
        if ( $user == "inserted successfully") {
            return view('HomePage', [
                'success' => 1 
            ]);
        }
        
        return view('Register', [
            'exception' => $user
        ]);
        

       
    }
}
