<?php

use App\Http\Controllers\compact;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\homeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
type de routes qu'on a: 
GET,POST,PUT,DELETE,PATCH,CONNECT,OPTION
*/
Route::get('/', function () {
    return view('welcome');
    // il pointe et fait le routage sur la page welcome.blade.php
    // qui est dans : exp1/resources/views
})->name('home');
Route::get('/test', function () {
    return view('test');
})->name('test');
Route::get('/vars', function () {
    $ville = 'oujda';
    return view('vars', [
        'ville' => $ville,
        'cours' => ['math', 'physique', 'arabe'],
    ]);
})->name('vars');

Route::get('/vars2/{nom}', function ($nom) {
    return view('vars2', [
        'nom' => $nom
    ]);
})->name('vars2');
Route::get('/vars3/{nom}/{prenom}', function (Request $request) {
    // dd($request);
    return view('vars3', [
        'nom' => $request->nom,
        'prenom' => $request->prenom,
    ]);
})->name('vars3');

Route::get('/controller', [homeController::class, 'index'])->name('controller');
Route::get('/controller2/{nom}', [homeController::class, 'index2'])->name('controller2');
Route::get('/compact', [compact::class, 'index'])->name('compact');
Route::get('/users', [compact::class, 'users'])->name('users');
Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
// Route::get('/customer/{id}', [CustomerController::class, 'get'])
// Route::get('/customer/{customer:email}', [CustomerController::class, 'get2']) si on veut specifier le paramettre exemple : email
// cette methode (get2) appelé : Route model binding
Route::get('/customer/{customer}', [CustomerController::class, 'get2']) // par defaut le param est : id
    ->where('customer', '\d+')
    ->name('customer');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('create');

Route::post('/store', [CustomerController::class, 'store'])->name('store');
Route::get('/rediriger', [CustomerController::class, 'rediriger'])->name('rediriger');
Route::get('/customer/login', [CustomerController::class, 'login'])->name('login');
Route::get('/customer/logout', [CustomerController::class, 'logout'])->name('logout');
Route::post('/customer/connect', [CustomerController::class, 'connect'])->name('connect');