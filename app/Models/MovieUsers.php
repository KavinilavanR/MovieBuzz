<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class MovieUsers extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $guarded = [];

    /**
     * Function to get the login details from LoginController
     * @param string Request from user
     * @return user object as json/exception message
     **/
    public function login(Request $req)
    {
        $user = MovieUsers::where('name', $req->input('name'))->first();

        if (!isset($user->name))
            return "username doesnot exist";

        if (Crypt::decryptString($user->password) == $req->input('pass')) {
            return $user;
        }

        return "failure";
    }

    /**
     * Function to get the user details for RegisterController
     * @param string Request from user through request form
     * @return return a string indicating the result
     **/
    public function register(Request $req)
    {

        $userCheck = MovieUsers::where('name', $req->input('name'))->first();

        if (isset($userCheck->name))
            return "Username Already exist";

        if ($req->input('n_pass') != $req->input('c_pass'))
            return 'password and confirm password are different';

        $user = new MovieUsers();
        $user->name = $req->input('name');
        $user->password = Crypt::encryptString($req->input('n_pass'));
        $user->dob = $req->input('dob');
        $user->admin_access = 0;

        if (!$user->save()) {
            Log::debug('unable to save');
        }

        return "inserted successfully";
    }

    /**
     * Function to get the user details for ForgetPasswordController
     * @param string Request from user through request form
     * @return return a string indicating the result
     **/
    public function forgetPassword(Request $req)
    {

        $user = MovieUsers::where('name', $req->input('name'))->first();

        if ($user->dob == $req->input('dob')) {
            return $user->id;

            return false;
        }
    }

    /**
     * Function to get the user details for ChangePasswordController
     * @param string Request from user through request form
     * @return null
     **/
    public function changePassword(Request $req, $id)
    {
        $user = MovieUsers::find($id);
        $user->password = Crypt::encryptString($req->input('n_pass'));

        if (!$user->save()) {
            Log::debug('unable to save');
        };
    }
}
