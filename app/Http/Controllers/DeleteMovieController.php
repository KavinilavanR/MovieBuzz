<?php

namespace App\Http\Controllers;
use App\Models\MovieDetail;
use Illuminate\Http\Request;

class DeleteMovieController extends Controller
{
    public function index() {
        $movies = MovieDetail::all();
        
        return view('DeleteMovie', [
            'movies' => $movies
        ]);

    }

    public function delete($id) {
        $movie = MovieDetail::find($id);
        $movie->delete();

    }
}
