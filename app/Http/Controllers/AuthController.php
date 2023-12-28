<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;

class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Check if the user exists in your database by email
        $user = UserModel::where('email', $googleUser->email)->first();
        $sessionUser = $user;
        // dd($user);

        if ($user) {
            Auth::login($user);
        } else {
            $newUser = new UserModel();
            $newUser->name = $googleUser->name;
            $newUser->email = $googleUser->email;
            $newUser->save();

            $sessionUser = $newUser;

            Auth::login($newUser);
        }

        session(['id' => $sessionUser->id]);
        session(['email' => $sessionUser->email]);
        session(['name' => $sessionUser->name]);

        return redirect('/main');
    }

}
