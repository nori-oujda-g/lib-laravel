<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// App\Http\Controllers\homeController
class homeController extends Controller
{
    public function index()
    {
        return 'salam 2';
    }
    public function index2(Request $request)
    {
        return view('controller2', ['nom' => $request->nom]);
    }
}
