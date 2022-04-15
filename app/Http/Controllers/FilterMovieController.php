<?php

namespace App\Http\Controllers;
use App\Models\MovieDetail;
use Illuminate\Http\Request;

class FilterMovieController extends Controller
{
    public function index (Request $req) {
        
        $movies = MovieDetail::filter($req);

        return view('MovieView',[
            'movies' => $movies,
            'search' => 1
        ]);


    }
}
