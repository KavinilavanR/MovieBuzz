<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Crypt;

class MovieUsers extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $guarded = [];


    /**
     * Function to get the login details from LoginController
     * @param string Request from user
     * @return  user object as json /exception message
     **/

    public function Login(Request $req)
    {
        $user = MovieUsers::where('name', $req->input('Uname'))->first();

        if (!isset($user->name))
            return "username doesnot exist";

        if (Crypt::decryptString($user->password) == $req->input('Pass')) {
            return $user;
        }
        return "failure";
    }
    /**
     * Function to get the user details for RegisterController
     * @param string Request from user through request form
     * @return  return  a string indicating the result
     **/
    public function Register(Request $req) {

        $userCheck = MovieUsers::where('name', $req->input('Uname'))->first();

        if (isset($userCheck->name))
            return "Username Already exist";

        if ($req->input('NPass') != $req->input('CPass'))
            return 'password and confirm password are different';

        $user = new MovieUsers();
        $user->name = $req->input('Uname');
        $user->password = Crypt::encryptString($req->input('NPass'));
        $user->dob = $req->input('DOB');
        $user->admin_access = 0;
        $user->save();

        return "inserted successfully";
    }
    /**
     * Function to get the user details for ForgetPasswordController
     * @param string Request from user through request form
     * @return  return  a string indicating the result
     **/
    public function forgetPassword(Request $req) {

        $user = MovieUsers::where('name', $req->input('Uname'))->first();

        if ($user->dob == $req->input('DOB')) {
            return $user->id;

            return false;
        }
    }
    /**
     * Function to get the user details for ChangePasswordController
     * @param string Request from user through request form
     * @return  nothing
     **/

    public function changePassword(Request $req, $id) {

        $user = MovieUsers::find($id);
        $user->password = Crypt::encryptString($req->input('Npass'));
        $user->save();
    }
}
