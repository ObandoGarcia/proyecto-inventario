<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
    public function login(Request $request){
        $credenciales =  $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string']
        ]);

        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('status', 'Has iniciado sesion correctamente!');
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed')
        ]);
    }

    public function logout(Request $request, Redirector $redirect){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $redirect->to('/')->with('status', 'Has cerrado sesion');
    }
}
