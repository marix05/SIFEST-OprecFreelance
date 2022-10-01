<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        
        request()->session()->forget('NIM');
        
        $data = [
            "title" => "Dashboard | SI FEST",
            "nav" => [
                "active" => 'Dashboard', 
            ],
        ];

        return view("web/dashboard/index", $data);
    }
}
