<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username'=>'required|string',
            'password'=>'required|string'
        ]);

        $user = $request->username;
        $pass = $request->password;

        // credenciales fijas
        if ($user === 'mily' && $pass === '1709') {
            $request->session()->put('user', $user);
            session()->flash('success', 'Ingreso correcto. ¡Bienvenido!');
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['credentials'=>'Usuario o contraseña incorrectos'])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect()->route('login');
    }
}
