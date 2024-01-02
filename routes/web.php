<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogicController;
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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// ------------ <Deprecated> ---------------------- 
/*

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
Route::post('/login', 'App\Http\Controllers\MyController@login');

*/
// ------------ </Deprecated> ----------------------


Route::get('/user-logout', [AuthController::class, 'logout']);
Route::get('/retrieve-contacts', [AuthController::class, 'retrieveGoogleContacts']);

Route::get('auth/redirect', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('/main', [LogicController::class,'showMain']);
Route::get('/request', [LogicController::class,'xmlhttprequest_search']);
Route::get('/request-cards', [LogicController::class, 'xmlhttprequest_cards']);
Route::get('/request-contacts', [LogicController::class, 'xmlhttprequest_contacts']);

Route::get('/create-personal-card', [LogicController::class, 'viewCreatePersonalCard']);
Route::post('/create-personal-card', [LogicController::class, 'createPersonalCard']);

Route::get('/create-work-card', [LogicController::class, 'viewCreateWorkCard']);
Route::post('/create-work-card', [LogicController::class, 'createWorkCard']);

Route::get('/create-contact', [LogicController::class, 'viewCreateContact']);
Route::post('/create-contact', [LogicController::class, 'createContact']);

Route::get('/signup', function () {
    return redirect('main');
});

Route::get('/login', function () {
    return redirect('main');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/newcard', function () {
    return view('newcard');
});
