<?php

namespace App\Http\Controllers;

use App\Models\MovieDetail;
use Illuminate\Http\Request;


class EditMovieController extends Controller
{
    /**
     * Function to display all movies
     * @param string null
     * @return return movielist in edit movie view page
     **/
    public function index()
    {
        $movies = MovieDetail::all();

        return view('EditMovie', [
            'movies' => $movies

        ]);
    }

    /**
     * Function to provide description of a  movie(editable)
     * @param string movie id
     * @return return movielist in deletemovie view page
     **/
    public function edit($id)
    {
        $movie = MovieDetail::showMovie($id);

        return view('EditSingleMovie', [
            'movie' => $movie
        ]);
    }

    /**
     * Function to update changes on a particular movie
     * @param string request from user ,movie id
     * @return null
     **/
    public function update(Request $req, $id)
    {
        $movie = MovieDetail::updateMovie($req, $id);
    }
}
