<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieDetail;

class EditMovieController extends Controller
{
    public function index() {

        $movies = MovieDetail::all();
        
        return view('EditMovie', [
            'movies' => $movies

        ]);
    }

    public function edit($id) {

        $movie = MovieDetail::display($id);

        return view('EditSingleMovie', [
            'movie' => $movie
        ]);
    }
    public function update(Request $req, $id) {

        $movie = MovieDetail::updateMovie($req, $id);
    }
}
