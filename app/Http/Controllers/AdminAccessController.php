<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieUsers;


class AdminAccessController extends Controller
{
    /**
     * Function to display users with no admin access
     * @param string null
     * @return  return non-admin user list array
     **/
    public function index() {
        $users = MovieUsers::where('admin_access', 0)->get();
        return view('AdminAccess', [
            'users' => $users
        ]);
    }

    /**
     * Function to give admin access
     * @param string user id
     * @return  nothing
     **/
    public function giveAccess($id) {
        $user = MovieUsers::find($id);
        $user->admin_access = 1;
        $user->save();
    }
}
