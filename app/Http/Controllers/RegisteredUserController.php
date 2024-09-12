<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        //validate
        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:5', 'confirmed'],

        ]);
        //create the user
        $user = User::create($validatedAttributes);
        //sign them in
        Auth::login($user);

        //redirect to the home page
        return redirect('/jobs');
    }
}
