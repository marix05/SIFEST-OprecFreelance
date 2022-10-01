<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticateController extends Controller
{
    public function index() {
        
        if (Session::get('NIM')) {
            return redirect()->route('register');
        }
        
        $data = [
            "title" => "Oprec Freelance | SI FEST",
            "nav" => [
                "active" => 'Home', 
            ],
        ];

        return view("web/home/login", $data);
    }

    public function store(Request $request) {

        $request->validate([
            "NIM" => "required|numeric",
            "password" => "required",
        ]);

        if(Auth::attempt([
            "NIM" => $request->NIM, 
            "password" => $request->password,
        ])){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        };

        return back()->with("error", "Login Failed, Incorrect NIM or Password");
    }
}
