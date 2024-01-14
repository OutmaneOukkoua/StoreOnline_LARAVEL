<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ClientRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('login.registration');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'client',
            'password' => bcrypt($request->password),
        ]);

        // Additional logic, if needed

        return redirect()->route('login.login')->with('success', 'Registration successful. Please log in.');
    }
}
