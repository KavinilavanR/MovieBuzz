<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieDetail;

class EditMovieController extends Controller
{
     /**
     * Function to display all movies
     * @param string null
     * @return  return movielist in edit movie view page
     **/
    public function index() {

        $movies = MovieDetail::all();
        
        return view('EditMovie', [
            'movies' => $movies

        ]);
    }

     /**
     * Function to description of a  movie(editable)
     * @param string movie id
     * @return  return movielist in deletemovie view page
     **/
    public function edit($id) {

        $movie = MovieDetail::showMovie($id);

        return view('EditSingleMovie', [
            'movie' => $movie
        ]);
    }

     /**
     * Function to update changes on a particular movie
     * @param string request from user ,movie id
     * @return nothing
     **/
    public function update(Request $req, $id) {

        $movie = MovieDetail::updateMovie($req, $id);
    }
}
