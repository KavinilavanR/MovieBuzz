<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieUsers;
use App\Models\MovieDetail;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{

  /**
   * Function to get the login details
   * @param string Request from user
   * @return  movie list view page.
   **/
  public function index(Request $req)
  {

    $movies = MovieDetail::all();
    $user = MovieUsers::Login($req);

    if ($user == "username doesnot exist") {
      return view('HomePage', [
        'NotAUser' => 1
      ]);
    }

    if ($user == "failure") {
      return view('HomePage', [
        'incorrect_pass' => 1
      ]);
    }

    if ($user->admin_access == 1) {
      return view('MovieView', [
        'access' => 1,
        'movies' => $movies,
        'search' => 1
      ]);
    } 
    
    else {
      return view('MovieView', [
        'movies' => $movies,
        'search' => 1
      ]);
    }
  }
}
