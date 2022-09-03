<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    private $divisions = [
        "competition",
        "seminar",
        "buddies",
        "sponsorship",
        "medpar",
        "marketing",
        "design",
        "videography",
        "publication",
        "bazaar",
        "consumption",
        "equipment"
    ];

    public function index() {

        $data = [
            "title" => "Admin Dashboard | SI FEST",
            "nav" => [
                "active" => "Dashboard",
            ],
        ];

        return view("admin/dashboard/index", $data);
    }
    
    public function division(Request $request) {
        $division = $request->division;

        if (in_array($division, $this->divisions)) {
            $data = [
                "title" => ucwords($division) . " Dashboard | SI FEST",
                "nav" => [
                    "active" => ucwords($division), 
                ],
            ];

            return view("admin/dashboard/$division", $data);
        }
        return abort(404);;
    }
}
