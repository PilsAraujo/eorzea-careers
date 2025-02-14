<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUSerController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userAttributes = $request->validate([
            'name'=> ['required'],
            'email'=> ['required', 'email', 'unique:users,email'],
            'password'=> ['required', 'confirmed', Password::min(6)],
        ]);

        $factionAttributes = $request->validate([
            'faction'=> ['required'],
            'logo'=> ['required', File::types(['png', 'jpg', 'webp'])],
        ]);

        $user = User::create($userAttributes);

        $logoPath = $request->logo->store('logos');

        $user->faction()->create([
            'name' => $factionAttributes['faction'],
            'logo' => $logoPath,
        ]);

        Auth::login($user);

        return redirect('/');
    }

}
