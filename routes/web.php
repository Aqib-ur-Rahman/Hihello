<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyController;
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
        return redirect('main');
    }
    else {
        return view('/signup');
    }
});
Route::post('/signup', 'App\Http\Controllers\MyController@createAccount');

Route::get('/login', function () {
    // return view('login');
    if (Session::has('id') && Session::has('email')) {
        return redirect('main');
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

Route::get('/logout', [MyController::class,'logout']);
 
Route::get('auth/redirect', [AuthController::class,'redirectToGoogle'])->name('google.signup');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);


Route::get('/search', function() {
    return view('search');
});

Route::get('/request', 'App\Http\Controllers\MyController@xmlhttprequest');