<?php

namespace App\Http\Controllers;

use App\Mail\myMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// App\Http\Controllers\homeController
class homeController extends Controller
{
    public function index(Request $request)
    {
        // nombre de pages visités :
        // 1ere methode :
        // $lastCount = $request->session()->get('compteur', 0);
        // $request->session()->put('compteur', $lastCount + 1);
        // $counter = $request->session()->get('compteur');
        // 2eme methode:
        $counter = $request->session()->increment('compteur');
        // $counter = $request->session()->increment('compteur', 2); //incrementation par 2
        // $request->session()->delete('compteur'); //suppression de la session avec pouvoir de le restaurer
        $request->session()->forget('compteur'); //suppression total de la session .
        return view('welcome', compact('counter'));
    }
    public function index2(Request $request)
    {
        return view('controller2', ['nom' => $request->nom]);
    }
    public function mail()
    {
        $mailler = new myMail();
        dd($mailler->content());
        Mail::to('nori.oujdi.2025@gmail.com')->send($mailler);

    }
    public function rediriger()
    {
        // les redirections:
        // redirect('/test');
        // redirect()->route('test'); ==ou==> to_route('test');
        // redirect()->route('vars',['id'=>22]); redirection avec parametre .
        // redirect()->action(...);
        // back('/test');  retour à la page precedente .
        // back('/customer')->withInput();  retour à la page precedente avec le formulaire remplie .
        return redirect('/test');
    }

}
