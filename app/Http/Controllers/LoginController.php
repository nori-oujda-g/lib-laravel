<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }
    public function connect(Request $request): RedirectResponse
    {
        $credentials = ['email' => $request->login, 'password' => $request->password];
        // dd(Auth::guard('customer')->attempt($credentials));
        //se connecter directement vas faire des problemes , regarder le fichier: configuration-auth.md pour voir la configuration necessaire pour authentifiquation. 
        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'you are well connected 😊');
        } else {
            return back()->withErrors([
                'login' => 'email or password are incorrect'
            ])->onlyInput('login');
        }
    }
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::guard('customer')->logout();
        return redirect('/')->with('success', 'you are well deconnected 🙄');
    }
}
