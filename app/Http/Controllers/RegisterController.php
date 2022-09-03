<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class RegisterController extends Controller
{
    public function index() {
        
        $provinces = Province::all();
        $regencies = Regency::all();
        
        $data = [
            "title" => "Oprec Freelance | SI FEST",
            "nav" => [
                "active" => 'Register', 
            ],
        ];

        return view("web/register/index", $data, compact("provinces", "regencies"));
    }

    public function store(Request $request) {

        $request->validate([
            "name" => ['required', 'string', 'max:60'],
            "NIM" => ['required', 'numeric', 'unique:users'],
            "email" => ['required', 'string', 'email:dns', 'unique:users', 'max:60'],
            "line" => ['required', 'string', 'max:30'],
            "class" => ['required', 'string'],
            'domicile' => ['required', 'string'],
            "first_choice" => ['required', 'string'],
            "first_reason" => ['required', 'max:1000', 'min:25'],
            "second_choice" => ['required', 'string'],
            "second_reason" => ['required', 'max:1000', 'min:25'],
            "password" => [
                'required',
                'confirmed',
                Password::defaults(),
            ],
            "password_confirmation" => ["required"],
            "wawancara" => ['required', 'string'],
            "identifier" => ['required', "file","image", 'mimes:jpeg,png,jpg,gif,svg', "max:2048"]
        ]);

        if($request->file('identifier')){
            $file = $request->file('identifier');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('../../public/img/post'), $filename);
            
            $user = new User([
                'name' => $request->name,
                'NIM' => $request->NIM,
                'email' => $request->email,
                'line' => $request->line,
                'class' => $request->class,
                'domicilie' => $request->domicilie,
                'first_choice' => $request->first_choice,
                'first_reason' => $request->first_reason,
                'second_choice' => $request->second_choice,
                'second_reason' => $request->second_reason,
                'password' => Hash::make($request->password),
                'wawancara' => $request->wanwancara,
                "identifier" => $filename,
            ]);
    
            $user->save();

            return redirect()->route("dashboard")->with("success", "Registration is successful, please read the information");
        }
        
        return back()->with("error", "Registration failed, try again");
    }
}