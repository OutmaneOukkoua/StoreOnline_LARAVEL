<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{ 
    public function show(){
        return view("login.show");
    }
    public function login(Request $req){
        $T = [
            "email" => $req->login,
            "password" => $req->password
        ];
        if (Auth::attempt($T)){
            $req->session()->regenerate();
            if (Auth::user()->role == "admin"){
                return redirect()->route("categories.index");
            }else{
                return redirect()->route("produits.acheter");
            }
        }else{
            return back()->with("erreur","Email ou mot de passe incorrect");
        }

    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route("login.login");
    }
}
