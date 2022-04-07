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
    protected $table='MovieDetails';
    protected $primaryKey='Id';
    public $timestamps = false;

    public function InsertMovie(Request $req)
    {
       
        $movie=new MovieDetail();
        $movie->MovieName=$req->input('Mname'); 
        $movie->Duration=$req->input('Duration'); 
        $movie->Cast_n_Crew=$req->input('Cast'); 
        $movie->ReleaseDate=$req->input('ReleaseDate');
       
        $movie->save();
        
        $movieList=MovieDetail::where('MovieName',$req->input('Mname'))->first();

        $language=$req->input('language');
        
        foreach ($language as $l)
            {
                $LanguageMovie= new LanguageMovie();
                $LanguageMovie->MovieId=$movieList->Id;
                $LanguageMovie->LanguageId=$l;
                
                $LanguageMovie->save();

            }
        return "success" ;  
    }

    public function ShowMovie($id)
    {
        $movie=MovieDetail::where('Id',$id)->first();
      
            $users = DB::table('LanguageMovie')
            ->join('MovieDetails', 'LanguageMovie.MovieId', '=', 'MovieDetails.Id')
            ->join('Language', 'LanguageMovie.LanguageId', '=', 'Language.Id')
             ->Where('MovieDetails.Id',$id)
            ->pluck('Name')
            ->toArray();
            
            $languages=implode(",",$users);
            $movie->languages=$languages;
            return $movie;

            // foreach($users as $user)
            // {
            //     echo "$user " ;
            // }
    }
}
