<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/signup', function () {
    // return view('signup');
    if (Session::has('id') && Session::has('email')) {
        return view('main');
    }
    else {
        return view('/signup');
    }
});
Route::post('/signup', 'App\Http\Controllers\MyController@createAccount');

Route::get('/login', function () {
    // return view('login');
    if (Session::has('id') && Session::has('email')) {
        return view('main');
    }
    else {
        return view('/login');
    }
});

Route::post('/login', 'App\Http\Controllers\MyController@login');

Route::get('/main', function () {
    if (Session::has('id') && Session::has('email')) {
        return view('main');
    }
    else {
        return redirect('/login')->with('loginError', 'Please log in to continue.');
    }
});

Route::get('/logout', 'App\Http\Controllers\MyController@logout');
