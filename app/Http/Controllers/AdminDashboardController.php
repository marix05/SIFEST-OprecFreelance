<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class AdminDashboardController extends Controller
{
    private $divisions = [
        "competition",
        "seminar",
        "buddies",
        "sponsorship",
        "media partner",
        "marketing",
        "design",
        "videography photography",
        "publication",
        "bazaar",
        "consumption",
        "equipment"
    ];

    public function index() {

        $users = User::all();

        $data = [
            "title" => "Admin Dashboard | SI FEST",
            "nav" => [
                "active" => "Dashboard",
            ],
            "users" => $users,
        ];

        return view("admin/dashboard/index", $data);
    }
    
    public function get_dataById($id) {
        $user = User::find($id);
        return response()->json([
            "status"=>200,
            "user"=>$user,
        ]);
    }
    
    public function division(Request $request) {
                
        $division = $request->division;

        if (in_array($division, $this->divisions)) {

            $users = User::where(function ($query) use ($division) {
                $query->where('first_choice', '=', $division)
                ->orWhere('second_choice', '=', $division);
            })->get();

            $data = [
                "title" => ucwords($division) . " Dashboard | SI FEST",
                "nav" => [
                    "active" => ucwords($division), 
                ],
                "users" => $users,
                "division" => ucwords($division),
            ];

            return view("admin/dashboard/division", $data);
        }

        return abort(404);
    }

    public function edit_data(Request $request) {
    
        $NIM = $request->NIM;
        $user = User::where('NIM', $NIM)->first();
        
        if ($request->password) {
            $request->validate([
                "interview" => "required",
                "password" => [
                    "required",
                    Password::defaults(),
                ],
            ]);

            $user->update([
                'password' => Hash::make($request->password),
                'interview' => $request->interview,
            ]);
            return back()->with("success", "Data Edited");
        } else {
            $request->validate([
                "interview" => "required",
            ]);

            $user->update([
                'interview' => $request->interview,
            ]);
            return back()->with("success", "Data Edited");
        }
        
        $request->session()->regenerate();
        return back()->with("error", "Failed to edit data");
    }
    
    public function delete_data(Request $request) {
        $NIM = $request->NIM;
        $user = User::where('NIM', $NIM)->first();
        if ($user) {
            // delete data user
            $user->delete();
            
            // also delete identifier KRS/KPM img from user data
            $img_path = public_path('KRS_KPM\\').$user->identifier;
            if(File::exists($img_path)) {
                File::delete($img_path);
            }

            $request->session()->regenerate();
            return back()->with("success", "Data deleted");
        }
        
        return back()->with("error", "Failed to delete data");
    }
    
    public function update_result(Request $request) {
        
        $NIM = $request->NIM;
        $user = User::where('NIM', $NIM)->first();

        if ($request->result) {
            $request->validate([
                "result" => "required",
            ]);
            
            $user->update([
                'result' => $request->result,
            ]);

            return back()->with("success", "Successfully recruiting freelancer");
        } else {
            $user->update([
                'result' => $request->result,
            ]);
            
            return back()->with("success", "Successfully cancel recruitment");
        }

        return back()->with("error", "Failed to recruit freelancer");
    }
}
