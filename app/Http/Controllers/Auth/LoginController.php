<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    { 
        return view('Auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();        
        if(auth()->user()->role === 'admin'){
            return redirect('/dashboard')->with('welcome','Welcome Back');
        }else{
         return redirect('/feed')->with('welcome','Welcome Back');
        }
    }

     /**
     * Destroy an login session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
