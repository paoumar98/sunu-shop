<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function index() {
        return view('admin.login');
    }

    public function store(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');

        if (! Auth::guard('admin')->attempt($credentials)) {
            return back()->withErrors([
                'message' => 'Identifiants incorrects, veuillez réessayer'
            ]);
        }

        session()->flash('msg','Vous êtes connecté!');

        return redirect('/admin');

    }

    public function logout() {
        auth()->guard('admin')->logout();

        session()->flash('msg','Vous êtes déconnecté');

        return redirect('/admin/login');
    }

}
