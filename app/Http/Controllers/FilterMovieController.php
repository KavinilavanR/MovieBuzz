<?php

namespace App\Http\Controllers;
use App\Models\MovieDetail;
use Illuminate\Http\Request;

class FilterMovieController extends Controller
{   
     /**
     * Function to display movies based on requested filters
     * @param string request
     * @return  return movielist in deletemovie view page
     **/
    public function index (Request $req) {
        
        $movies = MovieDetail::filter($req);

        return view('MovieView',[
            'movies' => $movies,
            'search' => 1
        ]);


    }
}
