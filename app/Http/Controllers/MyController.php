<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyUser;

class MyController extends Controller
{
    public function createAccount(Request $request)
    {
        $user = new MyUser;
        $user->name = $request->input('fullname-input');
        $user->email = $request->input('email-input');
        $user->password = $request->input('password-input');
        $status = $user->save();

        session(['id' => $user->id]);
        session(['email' => $user->email]);
        session(['name' => $user->name]);

        if ($status) {
            return redirect('/main')->with('accountCreationSuccess', 'Your new account has been created successfully.');
        } else {
            return redirect('/main')->with('accountCreationError', 'An error occured in account creation.');
        }
    }

    public function login(Request $request)
    {
        $email = $request->input('email-input');
        $pass = $request->input('password-input');

        $user = MyUser::where('email', $email)->first();

        if ($user) {
            if ($pass === $user->password) {

                session(['id' => $user->id]);
                session(['email' => $user->email]);
                session(['name' => $user->name]);
                // session(['avatar' => $user->avatar]);

                return redirect('/main');

            } 
            else {
                return redirect('/login')->with('loginError', 'The email or password you entered is wrong.');
            }
        } 
        else {
            return redirect('/login')->with('loginError', 'The email or password you entered is wrong.');
        }
    }

    public function logoutUser(Request $request)
    {
        $request->session()->forget('id');
        $request->session()->forget('email');
        $request->session()->forget('name');
        $request->session()->forget('avatar');

        return redirect('/home')->with('logOutSuccess', 'Log out is successful.');
    }

    
    public function xmlhttprequest() {
        $searchTerm = request('search');
        
        if (strlen($searchTerm) > 0) {
            $searchResults = MyUser::where('name', 'like', $searchTerm . '%')->get();
        }
    
        return response()->json($searchResults);
    }
    
}
