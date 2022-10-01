<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, "index"])->name("home");
    Route::post('/', [HomeController::class, "store"]);
    Route::get('login', [AuthenticateController::class, "index"])->name("login");
    Route::post('login', [AuthenticateController::class, "store"]);
});

Route::middleware('validate.nim')->group(function () {
    Route::get('register', [RegisterController::class, "index"])->name("register");
    Route::post('register', [RegisterController::class, "store"])->name("store_register");
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, "index"])->name("dashboard");
});

Route::middleware('guest:admin')->group(function () {
    Route::get("sifest2022/admin", [AdminController::class, "create"])->name("admin");
    Route::post("sifest2022/admin", [AdminController::class, "store"]);
});

Route::middleware('auth:admin')->group(function () {
    Route::get("sifest2022/admin/user/{id}", [AdminDashboardController::class, "get_dataById"])->name("get_dataById");

    Route::get("sifest2022/admin/dashboard", [AdminDashboardController::class, "index"])->name("admin_dashboard");
    Route::get("sifest2022/admin/dashboard/{division}", [AdminDashboardController::class, "division"])->name("division_dashboard");

    Route::post("sifest2022/admin/logout", [AdminController::class, "logout"])->name("admin_logout");

    Route::delete("sifest2022/admin/dashboard", [AdminDashboardController::class, "delete_data"])->name("delete_data");
    Route::post("sifest2022/admin/dashboard", [AdminDashboardController::class, "edit_data"])->name("edit_data");
    
    Route::post("sifest2022/admin/dashboard/{division}", [AdminDashboardController::class, "update_result"])->name("update_result");
});
