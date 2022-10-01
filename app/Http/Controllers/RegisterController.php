<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\Mahasiswa2022;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class RegisterController extends Controller
{    
    public function index() {
        
        $NIM = request()->session()->get('NIM');
        $mahasiswa = Mahasiswa2022::getData($NIM);

        $data = [
            "title" => "Registration Freelance | SI FEST",
            "nav" => [
                "active" => 'Register', 
            ],
            "mahasiswa" => [
                "name" => ucwords(strtolower($mahasiswa['name'])),
                "NIM" => $mahasiswa['NIM'],
            ],
        ];

        return view("web/register/index", $data);
    }

    public function store(Request $request) {

        $request->validate([
            "name" => ['string', 'max:60'],
            "NIM" => ['numeric', 'unique:users'],
            "email" => ['required', 'string', 'email:dns', 'unique:users', 'max:60'],
            "line" => ['required', 'string', 'max:30'],
            "class" => ['required', 'string'],
            'domicile' => ['required', 'string'],
            "first_choice" => ['required', 'string'],
            "first_reason" => ['required', 'max:1000', 'min:5'],
            "second_choice" => ['required', 'string'],
            "second_reason" => ['required', 'max:1000', 'min:5'],
            "password" => [
                'required',
                'confirmed',
                Password::defaults(),
            ],
            "password_confirmation" => ["required"],
            "interview" => ['required', 'string'],
            "identifier" => ['required', "image", 'mimes:jpeg,png,jpg,gif,svg', "max:2048"]
        ]);

        if($request->file('identifier')){
            $file = $request->file('identifier');
            $filename = date('YmdHi').".".$file->getClientOriginalName();
            $file->move(public_path('KRS_KPM'), $filename);
            
            $user = new User([
                'name' => $request->name,
                'NIM' => $request->NIM,
                'email' => $request->email,
                'line' => $request->line,
                'class' => $request->class,
                'domicile' => $request->domicile,
                'first_choice' => $request->first_choice,
                'first_reason' => $request->first_reason,
                'second_choice' => $request->second_choice,
                'second_reason' => $request->second_reason,
                'password' => Hash::make($request->password),
                'interview' => $request->interview,
                "identifier" => $filename,
            ]);
            
            $user->save();

            if(Auth::attempt([
                "NIM" => $request->NIM, 
                "password" => $request->password,
            ])){
                $request->session()->regenerate();
                return redirect()->intended('/dashboard')->with("success", "Registration is successful, please read the information");
            };

        }
        
        return back()->with("error", "Registration failed, try again");
    }
}