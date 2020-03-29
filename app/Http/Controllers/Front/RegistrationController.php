<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{

    public function index() {
        return view('front.registration.index');
    }

    public function store(Request $request) {

        $request->validate([
           'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'address' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,

        ]);

        auth()->login($user);

        return redirect('/user/profile');

    }

}
