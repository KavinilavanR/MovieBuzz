<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Models\MovieDetail;
use App\Models\LanguageMovie;

class MovieListController extends Controller
{
    /**
     * Function to insert a new movie
     * @param string movie details as request from user
     * @return  nothing
     **/
    public function create(Request $req) {

        $movie = MovieDetail::InsertMovie($req);
       
    }
     /**
     * Function to display description of a movie
     * @param string movie id
     * @return  return movie description in moviedescription view page
     **/

    public function view($id) {
        $movie = MovieDetail::ShowMovie($id);

        return view('MovieDescription', ['movie' => $movie]);
    }

     /**
     * Function to display list of  movies based search filter
     * @param string nsearch as a request from user
     * @return  return movieview page based on applied search filters
     **/
    public function search(Request $req) {
        $movie = MovieDetail::where('name', 'like', '%' . $req->input('search') . '%')->get();
        return view('MovieView', [
            'search' => 1,
            'movies' => $movie
        ]);
    }
}
