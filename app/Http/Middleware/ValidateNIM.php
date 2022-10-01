<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ValidateNIM
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $NIM = Session::get('NIM');
        if (User::checkData($NIM)) {
            Session::forget('NIM');;
            return redirect()->route('login')->with("error", "Your NIM is already registered, please login");
        }
        
        if (!$NIM) {
            return redirect()->route('home');
        }
        
        return $next($request);
        
    }
}
