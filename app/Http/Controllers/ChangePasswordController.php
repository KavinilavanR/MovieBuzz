<?php

namespace App\Http\Controllers;

use App\Models\MovieUsers;
use Illuminate\Http\Request;


class ChangePasswordController extends Controller
{
    /**
     * Function to get the user details for ChangePassword page
     * @param string Request from user through request form
     * @return return to the respective view page based on results
     **/
    public function index(Request $req, $id)
    {
        if ($req->input('n_pass') == $req->input('c_pass')) {
            $user = MovieUsers::changePassword($req, $id);

            return view('HomePage', [
                'passwordChanged' => 1
            ]);
        }

        return view('ChangePassword', [
            'failure' => 1
        ]);
    }
}
