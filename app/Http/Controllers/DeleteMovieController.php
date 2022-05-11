<?php

namespace App\Http\Controllers;

use App\Models\MovieDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeleteMovieController extends Controller
{
    /**
     * Function to display all movies
     * @param string null
     * @return return movielist in deletemovie view page
     **/
    public function index()
    {
        $movies = MovieDetail::all();

        return view('DeleteMovie', [
            'movies' => $movies
        ]);
    }
    
    /**
     * Function to delete a movie
     * @param string movie id
     * @return return null
     **/

    public function delete($id)
    {
        $movie = MovieDetail::find($id);

        if (!$movie->delete()) {
            Log::debug('unable to delete');
        }
    }
}
