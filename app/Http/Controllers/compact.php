<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class compact extends Controller
{
    public function index()
    {
        $nom = 'ali';
        $email = 'ali@gmail';
        $age = NULL;
        $languages = ['php', 'java', 'python', 'javascript', 'c++'];
        $color = 'redf';
        // $languages = [];
        $vals = [33, 54, 2, 100, 3, 6];
        $tab = [];
        $x1 = 16;
        $x2 = 10;
        return view('compact', compact('nom', 'email', 'languages', 'vals', 'age', 'color', 'x1', 'x2'));
    }
    public function users(Request $request)
    {
        $users = [
            ['id' => 1, 'name' => 'amine', 'email' => 'amin@gmail.com', 'job' => 'builder'],
            ['id' => 2, 'name' => 'yassin', 'email' => 'yassin@yahoo.com', 'job' => 'developper'],
            ['id' => 3, 'name' => 'ali', 'email' => 'ali@gmail.com', 'job' => 'engenner'],
        ];
        return view('users', compact('users'));
    }
}
