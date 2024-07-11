<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function create() 
    {
        return view('pages.auth.register');
    }

    public function store(Request $request): RedirectResponse
    {

        Session::flash('username', $request->name);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:dns|unique:users',
            'password' => 'required|string|min:4'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return to_route('login');
    }
}
