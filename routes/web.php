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
Route::get('/compact', [compact::class, 'index'])->name('compact')->middleware('auth');
Route::get('/users', [compact::class, 'users'])->name('users');
Route::get('/rediriger', [CustomerController::class, 'rediriger'])->name('rediriger');
Route::get('/login', [CustomerController::class, 'login'])->name('login');
Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');
Route::post('/connect', [CustomerController::class, 'connect'])->name('connect');

// Route::get('/customers/{id}', [CustomerController::class, 'get'])
// Route::get('/customers/{customer:email}', [CustomerController::class, 'show']) si on veut specifier le paramettre exemple : email
// cette methode (show) appelé : Route model binding
// ###################################### PREMIERE METHODE DE ROUTAGE #########################################################
// Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
// Route::get('/customers/{customer}', [CustomerController::class, 'show']) // par defaut le param est : id
//     ->where('customer', '\d+')
//     ->name('customers.customer');
// Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
// Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
// Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
// Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');

// Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');

// ###################################### 2EME METHODE DE ROUTAGE #########################################################
// Route::name('customers.')->prefix('customers')->group(function () {
//     Route::controller(CustomerController::class)->group(function () {
//         Route::get('/', 'index')->name('index');
//         Route::get('/{customer}', 'show')->where('customer', '\d+')->name('show');
//         Route::get('/{customer}/edit', 'edit')->name('edit');
//         Route::put('/{customer}', 'update')->name('update');
//         Route::delete('/{customer}', 'destroy')->name('destroy');
//         Route::get('/create', 'create')->name('create');
//         Route::post('/', 'store')->name('store');
// ----------------------------------------------------------------------------------
//         Route::get('/login', 'login')->name('login');
//         Route::get('/logout', 'logout')->name('logout');
//         Route::post('/connect', 'connect')->name('connect');
//     });
//     // on peu afficher ces routes par la commande: php artisan route:list --name=customers
// });
// ###################################### 3EME METHODE DE ROUTAGE  #########################################################
// il faut respecter les noms des methodes CustomerController de pour que cette methode fonctionne .
// Route::name('customers.')->prefix('customers')->group(function () {
//     Route::controller(CustomerController::class)->group(function () {
//         Route::get('/login', 'login')->name('login');
//         Route::get('/logout', 'logout')->name('logout');
//         Route::post('/connect', 'connect')->name('connect');
//     });
// });
Route::resource('customers', CustomerController::class);
