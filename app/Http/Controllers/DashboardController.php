<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        
        $data = [
            "title" => "Oprec Freelance | SI FEST",
            "nav" => [
                "active" => 'Dashboard', 
            ],
        ];

        return view("web/dashboard/index", $data);
    }
}
