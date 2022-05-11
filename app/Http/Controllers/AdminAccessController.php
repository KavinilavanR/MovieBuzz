<?php

namespace App\Http\Controllers;

use App\Models\MovieUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AdminAccessController extends Controller
{
    /**
     * Function to display users with no admin access
     * @param string null
     * @return return non-admin user list array
     **/
    public function index()
    {
        $users = MovieUsers::where('admin_access', 0)->get();
        return view('AdminAccess', [
            'users' => $users
        ]);
    }

    /**
     * Function to give admin access
     * @param string user id
     * @return null
     **/
    public function giveAccess($id)
    {
        $user = MovieUsers::find($id);
        $user->admin_access = 1;

        if(!$user->save()) {
            Log::debug('unable to give admin access');
        };
    }
}
