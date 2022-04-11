<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Models\MovieDetail;
use App\Models\LanguageMovie;
class MovieListController extends Controller
{
     /**
     * Function to get the login details
     * @param string Request from user
     * @return  movie list view page.
     **/
    public function index(){
        
        $movieList = MovieDetail::all();
        
        foreach ( $movieList as $movie )
                {
                    echo " $movie->Cast ";
                }


    }
    
    public function create(Request $req)
        {
        
            $movie=MovieDetail::InsertMovie($req);
            echo "$movie" ;
    
        }

    public function view($id)
            {
                $movie=MovieDetail::ShowMovie($id);

                return view('MovieDescription',['movie'=>$movie]);
            }    
    
    
    public function upload(Request $req)
        {
            $file=$req->file('myfile')->store('movies');
            $file="/home/zoomrx/application/MovieBuzz/storage/app/".$file;
            echo"$file hi";
            rename($file, "/home/zoomrx/application/MovieBuzz/public/images/.jpg");
        }

    public function list(Request $req,$id)
    {   
       $movie=MovieDetail::where('MovieName','like','%'.$req->input('search').'%')->get();
        if($id==1) {
            return view('MovieView', [
                'search' => 1,
                'movies'=>$movie,
                'access'=>1
            ]);

        }

        return view('MovieView',[
            'search'=>1,
            'movies'=>$movie
        ]);
    
    }    
    public function search(Request $req)
    {
        $movie=MovieDetail::where('MovieName','like','%'.$req->input('search').'%')->get();
        return view('MovieView',[
            'search'=>1,
            'movies'=>$movie
        ]);

    }
}


