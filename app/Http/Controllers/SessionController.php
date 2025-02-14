<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        //validate
        $validUSer = request()->validate([
            'email'=> ['required',  'email'],
            'password'=> ['required'],
        ]);
        //attempt to login the user
        if (! Auth::attempt($validUSer, true)) {
            throw ValidationException::withMessages([
                'email'=> 'Sorry, credentials were not found.',
            ]);
        };

        //regenerate the session token --session hijacking protection
        request()->session()->regenerate();

        //redirect
        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
