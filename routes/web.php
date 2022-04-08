<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('HomePage');});
Route::post('/login','App\Http\Controllers\LoginController@index');
Route::get('/register', function () {return view('Register');});
Route::post('/register','App\Http\Controllers\RegisterController@index');
Route::get('/movies',function(){return view('MoviesList');});
Route::post('/movies','App\Http\Controllers\MovieListController@create');
Route::get('/movies/{id}','App\Http\Controllers\MovieListController@view');
Route::get('/MovieView/{id}','App\Http\Controllers\MovieListController@list');
Route::post('/MovieView','App\Http\Controllers\MovieListController@search');
Route::get('/upload',function(){return view('upload');});
Route::post('/upload','App\Http\Controllers\MovieListController@upload');
Route::get('/forgetPassword',function(){return view('ForgetPassword');});
