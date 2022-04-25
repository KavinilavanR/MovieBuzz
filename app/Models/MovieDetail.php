<?php

namespace App\Models;

use App\Models\LanguageMovie;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MovieDetail extends Model
{
    use HasFactory;
    protected $table = 'movies';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * Function to get the request for new movie details from MovieListController@create
     * @param string Request from user
     * @return  status message(success/failure)
     **/
    public function InsertMovie(Request $req)
    {

        $movie = new MovieDetail();
        $movie->name = $req->input('Mname');
        $movie->duration = $req->input('Duration');
        $movie->cast_n_crew = $req->input('Cast');
        $movie->release_date = $req->input('ReleaseDate');

        $movie->save();

        $movieList = MovieDetail::where('name', $req->input('Mname'))->first();
        $file = $req->file('myfile')->store('movies');

        $FileFrom = "/home/zoomrx/application/MovieBuzz/storage/app/" . $file;
        $FileTo = "/home/zoomrx/application/MovieBuzz/public/images/" . $movieList->id . ".jpg";

        rename($FileFrom, $FileTo);

        $language = $req->input('language');

        foreach ($language as $l) {
            $LanguageMovie = new LanguageMovie();
            $LanguageMovie->movie_id = $movieList->id;
            $LanguageMovie->language_id = $l;

            $LanguageMovie->save();
        }
        return "success";
    }
    /**
     * Function to show the movie details of a movie
     * @param string id from request url
     * @return  movie details array
     **/
    public function ShowMovie($id)
    {

        $movie = MovieDetail::where('id', $id)->first();

        $users = DB::table('languages_movies')
            ->join('movies', 'languages_movies.movie_id', '=', 'movies.id')
            ->join('languages', 'languages_movies.language_id', '=', 'languages.id')
            ->Where('movies.id', $id)
            ->pluck('languages.name')
            ->toArray();

        $languages = implode(",", $users);
        $movie->languages = $languages;

        return $movie;
    }
    /**
     * Function to  perform updation on movie details 
     * @param string Request from user, movie id
     * 
     **/

    public function updateMovie(Request $req, $id)
    {

        $movie = MovieDetail::find($id);

        $movie->name = $req->input('name');
        $movie->duration = $req->input('duration');
        $movie->release_date = $req->input('release_date');
        $movie->cast_n_crew = $req->input('cast_n_crew');
        $movie->save();

        if ($req->hasFile('movie_file') == 1) {
            $file = $req->file('movie_file')->store('movies');

            $FileFrom = "/home/zoomrx/application/MovieBuzz/storage/app/" . $file;
            $FileTo = "/home/zoomrx/application/MovieBuzz/public/images/" . $movie->id . ".jpg";

            rename($FileFrom, $FileTo);
        }

        if (!is_null($req->input('language'))) {

            $language = $req->input('language');
            $languages = LanguageMovie::where('movie_id', $id)->get();

            foreach ($languages as $lang) {
                $lang->delete();
            }

            foreach ($language as $l) {

                $LanguageMovie = new LanguageMovie();
                $LanguageMovie->movie_id = $movie->id;
                $LanguageMovie->language_id = $l;

                $LanguageMovie->save();
            }
        }
    }

    public function filter(Request $req)
    {

        $language = $req->input('language');
        $movieIds = LanguageMovie::whereIn('language_id', $language)->pluck('movie_id')->toArray();
        $movies = MovieDetail::whereIn('id', $movieIds)->get();
        return $movies;
    }
}
