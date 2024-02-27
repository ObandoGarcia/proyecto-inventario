<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials =  $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string']
        ]);

        if(Auth::attempt($credentials)){
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

    public function register(Request $request, Redirector $redirect){
        $user = new User();
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->password = Hash::make($request->post('password'));
        $user->save();
        return $redirect->to('login')->with('status', 'Usuario creado exitosamente!');
    }
}
