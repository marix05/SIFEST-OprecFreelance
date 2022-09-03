<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    public function create() {

        $data = [
            "title" => "Login Admin | SI FEST",
            "nav" => [
                "active" => "Auth",
            ],
        ];

        return view("admin/auth/login", $data);
    }
    
    public function store(Request $request) {
        
        $request->validate([
            "username" => "required",
            "password" => "required",
        ]);

        if (Auth::guard('admin')->attempt([
            "username" => $request->username, 
            "password" => $request->password,
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/sifest2022/admin/dashboard');
        }

        return back()->with("error", "Login Failed, Incorrect Username or Password");
    }
    
    public function logout(Request $request) {
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("admin");
    }
}



