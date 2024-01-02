<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;
use App\Models\MyUser;
use App\Models\CardModel;

use Illuminate\Support\Facades\Auth;

class LogicController extends Controller
{
    public function xmlhttprequest_search()
    {
        $searchTerm = request('search');

        if (strlen($searchTerm) > 0) {
            $searchResults = MyUser::where('name', 'like', $searchTerm . '%')->get();
        }

        return response()->json($searchResults);
    }

    public function xmlhttprequest_cards()
    {
        if (Auth::check() && Auth::id() == session('id') && Auth::user()->email == session('email')) {
            $userId = request('user_id');

            if (strlen($userId) > 0) {
                $cards = CardModel::where('user_id', $userId)->get();
            }

            return response()->json($cards);
        } else {
            return null;
        }
    }

    public function xmlhttprequest_contacts()
    {
        if (Auth::check() && Auth::id() == session('id') && Auth::user()->email == session('email')) {
            $userId = request('user_id');

            if (strlen($userId) > 0) {
                $cards = ContactModel::where('user_id', $userId)->get();
            }

            return response()->json($cards);
        } else {
            return null;
        }
    }

    public function showMain()
    {
        if (Auth::check() && Auth::id() == session('id') && Auth::user()->email == session('email')) {
            return view('main');
        } else {
            return view('/login')->with('loginError', 'Please log in to continue.');
        }
    }

    public function viewCreateWorkCard()
    {
        if (Auth::check() && Auth::id() == session('id') && Auth::user()->email == session('email')) {
            return view('create-work-card');
        } else {
            return redirect('/login')->with('loginError', 'Please log in to continue.');
        }
    }

    public function createWorkCard(Request $request)
    {
        $contact = new CardModel();

        $contact->fullname = $request->input('fullname-input');
        $contact->email = $request->input('email-input');
        $contact->contact_number = $request->input('contact-input');
        $contact->designation = $request->input('designation-name');
        $contact->organization_name = $request->input('organization-name');
        $contact->organization_address = $request->input('organization-address');

        if (!Auth::check()) {
            return redirect('/login')->with('loginError', 'Please log in to continue.');
        } else {
            $contact->user_id = Auth::id();
            $contact->save();

            return redirect('main')->with('cardCreationSuccessful', 'A new card has been created successfully.');
        }

    }

    public function viewCreatePersonalCard()
    {
        if (Auth::check() && Auth::id() == session('id') && Auth::user()->email == session('email')) {
            return view('create-personal-card');
        } else {
            return redirect('/login')->with('loginError', 'Please log in to continue.');
        }
    }

    public function createPersonalCard(Request $request)
    {
        $contact = new CardModel();

        $contact->fullname = $request->input('fullname-input');
        $contact->email = $request->input('email-input');
        $contact->contact_number = $request->input('contact-input');
        $contact->designation = null;
        $contact->organization_name = null;
        $contact->organization_address = $request->input('address');

        if (!Auth::check()) {
            return redirect('/login')->with('loginError', 'Please log in to continue.');
        } else {
            $contact->user_id = Auth::id();
            $contact->save();

            return redirect('main')->with('cardCreationSuccessful', 'A new card has been created successfully.');
        }

    }

    public function viewCreateContact()
    {
        if (Auth::check() && Auth::id() == session('id') && Auth::user()->email == session('email')) {
            return view('create-contact');
        } else {
            return redirect('/login')->with('loginError', 'Please log in to continue.');
        }
    }

    public function createContact(Request $request)
    {
        $contact = new ContactModel();

        $contact->fullname = $request->input('fullname-input');
        $contact->email = $request->input('email-input');
        $contact->contact_number = $request->input('contact-input');
        $contact->organization_name = $request->input('organization-name');
        $contact->organization_address = $request->input('organization-address');

        if (!Auth::check()) {
            return redirect('/login')->with('loginError', 'Please log in to continue.');
        } else {
            $contact->user_id = Auth::id();
            $contact->save();

            return redirect('main')->with('cardCreationSuccessful', 'A new contact has been created successfully.');
        }
    
    }


}
