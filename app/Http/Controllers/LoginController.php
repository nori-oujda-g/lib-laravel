<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    // remarque:
    // Auth::guard('customer')->user()
    // auth('customer')->user()
    // auth()->guard('customer')->user()
    // sont la même chose
    public function login()
    {
        return view('login.login');
    }
    public function connect2(Request $request): RedirectResponse
    {
        DB::table('sessions')->update([
            'user_id' => 200,
        ]);
        return redirect('/')->with('success', 'test sessions 😊');
    }
    public function connect(Request $request): RedirectResponse
    {
        $credentials = ['email' => $request->login, 'password' => $request->password];
        // dd(Auth::guard('customer')->attempt($credentials));
        //se connecter directement vas faire des problemes , regarder le fichier: configuration-auth.md pour voir la configuration necessaire pour authentifiquation. 
        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            DB::table('sessions')->update([
                'user_id' => auth('customer')->user()->id,
            ]);
            return redirect('/')->with('success', 'you are well connected 😊');
        } else {
            return back()->withErrors([
                'login' => 'email or password are incorrect'
            ])->onlyInput('login');
        }
        // return redirect('/')->with('success', 'test connect 😊');
    }
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::guard('customer')->logout();
        return redirect('/')->with('success', 'you are well deconnected 🙄');
    }
}
