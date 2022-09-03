<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa2022;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
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

        return view("web/home/index", $data);
    }
    
    public function store(Request $request) {

        $request->validate([
            "NIM" => "required|numeric",
        ]);

        if(Mahasiswa2022::validateNIM($request->NIM)) {
            Session::put('NIM', $request->NIM);
            $request->session()->regenerate();
            return redirect()->intended('/register')->with("success", "Successful, now complete your registration");
        } 
        
        return back()->with("error", "NIM is not eligible or wrong");
    
    }
}
