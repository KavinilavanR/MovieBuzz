<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieUsers;


class AdminAccessController extends Controller
{
    public function index() {
        $users = MovieUsers::where('admin_access', 0)->get();
        return view('AdminAccess', [
            'users' => $users
        ]);
    }
    
    public function giveAccess($id) {
        $user = MovieUsers::find($id);
        $user->admin_access = 1;
        $user->save();
    }
}
