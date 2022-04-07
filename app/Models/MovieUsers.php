<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Crypt;

class MovieUsers extends Model
{
    use HasFactory;
    protected $table='MovieUsers';
    protected $guarded=[];
    
    
    public function Login(Request $req)
    {
        $user=MovieUsers::where('name',$req->input('Uname'))->first();
        if(!isset($user->name))
            return "username doesnot exist";

        if(Crypt::decryptString($user->password)==$req->input('Pass')){
            return $user;
        }
        return "failure";
    }

    public function Register(Request $req)
    {
        $userCheck=MovieUsers::where('name',$req->input('Uname'))->first();
      
        if (isset($userCheck->name))
        return "Username Already exist";
        if($req->input('NPass')!=$req->input('CPass'))
        return 'password and confirm password are different';

        $user=new MovieUsers();
        $user->name=$req->input('Uname');
        $user->password=Crypt::encryptString($req->input('NPass'));
        $user->DOB=$req->input('DOB');
        $user->AdminAccess=0;
        $user->save();
        return "inserted successfully";
    }

}
