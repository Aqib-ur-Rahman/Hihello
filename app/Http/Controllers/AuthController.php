<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\UserModel;
use Google\Client as Google_Client;
use Google\Service\PeopleService;
use Exception;

class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        if (Auth::check()) {
            return redirect("main");
        }
        else {
            return Socialite::driver('google')->with([
                'access_type' => 'offline',
                'scopes' => ['https://www.googleapis.com/auth/contacts']
            ])->redirect();
        }
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = UserModel::where('email', $googleUser->email)->first();

            if ($user) {
                $user->google_token = $googleUser->token;
                $user->google_refresh_token = $googleUser->refreshToken;
                $user->save();
                
                Auth::logout();
                Auth::login($user);
            } else {
                $newUser = new UserModel();
                $newUser->name = $googleUser->name;
                $newUser->email = $googleUser->email;
                $newUser->avatar = $googleUser->avatar;
                $newUser->google_token = $googleUser->token;
                $newUser->google_refresh_token = $googleUser->refreshToken;
                $newUser->save();

                Auth::logout();
                Auth::login($newUser);
            }

            session(['id' => Auth::id()]);
            session(['email' => Auth::user()->email]);
            session(['name' => Auth::user()->name]);
            session(['avatar' => Auth::user()->avatar]);

            return redirect('/main');
        } catch (Exception $e) {
            // ... (handle authentication errors) ...
            Log::info('Error in login: ' . $e->getMessage());
        }
    }

    public function logout()
    {
        // Clear tokens and session data
        $user = Auth::user();
        $user->google_token = null;
        $user->google_refresh_token = null;
        $user->save();

        Auth::logout();
        session()->flush(); // Clear all session data

        return redirect('/home');
    }

    // public function retrieveGoogleContacts()
    // {
    //     Log::info("\n\n--------------------------------\n\n");

    //     try {
    //         $user = Auth::user();
    //         if ($user == null) {
    //             Log::info('User is null.');
    //             // ... (handle missing user) ...
    //         }

    //         Log::info('User is fetched.');

    //         $googleClient = new Google_Client();
    //         $googleClient->setClientId(env('GOOGLE_CLIENT_ID'));
    //         $googleClient->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
    //         $googleClient->setRedirectUri(env('GOOGLE_REDIRECT'));
    //         $googleClient->setScopes(['https://www.googleapis.com/auth/contacts']);

    //         Log::info('Google Client set.');

    //         $accessToken = $user->google_token ?? null;

    //         if ($accessToken === null) {
    //             $authUrl = $googleClient->createAuthUrl();
    //             return redirect($authUrl);
    //         }

    //         $googleClient->setAccessToken($accessToken);
    //         $googleClient->getAccessToken(); // Ensure authorization

    //         $service = new PeopleService($googleClient);

    //         Log::info('People Service set.');

    //         $optParams = array(
    //             'pageSize' => 500,
    //             'requestMask.includeField' => 'person.names,person.emailAddresses,person.phoneNumbers'
    //         );
    //         $results = $service->people_connections->listPeopleConnections('people/me', $optParams);
    //         $contacts = $results->connections;

    //         Log::info('Contacts: ' . json_encode($contacts));

    //         // ... (process and return the contacts) ...
    //     } catch (Exception $e) {
    //         Log::info('Error retrieving contacts: ' . $e->getMessage());
    //         // ... (handle retrieval errors) ...
    //     }
    // }

}
