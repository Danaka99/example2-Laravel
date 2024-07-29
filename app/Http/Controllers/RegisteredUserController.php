<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(){
       //validate
        $attributes = request()->validate([
        'first_name' => ['required'],
        'last_name' => ['required'],
        'email' => ['required','email'],//email_confirmation
        'password' => ['required', password::min(6), 'confirmed'],//password_confirmation

       ]);
        //create the User
       $user = User::create($attributes);
       //login
        Auth::login($user);
        //redirect somewhere
        return redirect('/jobs');
    }
}
