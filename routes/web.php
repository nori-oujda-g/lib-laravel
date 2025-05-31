<?php

use App\Http\Controllers\compact;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PublicationController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\Guest;
use App\Services\Calcul;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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


Route::middleware([Guest::class])->group(function () {
    Route::get('/login', [CustomerController::class, 'login'])->name('login');
    Route::post('/connect', [CustomerController::class, 'connect'])->name('connect');
});
Route::middleware([Authenticate::class])->group(function () {
    Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');
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
    Route::get('/compact', [compact::class, 'index'])->name('compact')
        // ->middleware('auth');
        // ->middleware(Authenticate::class); //en cas appliquer middlewar sur un seul lien .
    ;
    Route::get('/users', [compact::class, 'users'])->name('users');
    Route::get('/rediriger', [CustomerController::class, 'rediriger'])->name('rediriger');

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
    Route::resource('publications', PublicationController::class);
    // php artisan route:list --name=publications
});
// --------------------------------------------------------
// route d'un parametre facultative:
Route::get('/facult/{age?}', function ($age = NULL) {
    if (empty($age))
        return 'age inconu';
    else
        return 'param facult age = ' . $age;
});
// informations d'une route
Route::get('/route', function () {
    // dd(Route::current());
    // dd(Route::currentRouteName());
    dd(Route::currentRouteAction());
})->name('bouaicha-route');
// redirection vers l'exterieur :
Route::get('/facebook', function () {
    return redirect()->away('https://www.facebook.com/');
})->name('facebook');
// ------------------------INJECTION DE DEPENDANCE----------------------------------------
// 1- couplage fort: ==> déconseillé .
Route::get('/sum1/{a}/{b}', function ($a, $b) {
    $calcul = new Calcul();
    return $calcul->sum($a, $b);
});
// 2- couplage faible: ==> solution professionel .
Route::get('/sum2/{a}/{b}', function ($a, $b, Calcul $calcul) {
    return $calcul->sum($a, $b);
});
// ------------------------------GESTION DES FORMULAIRES-----------------------------------
Route::view('/form', 'form');
Route::post('/form', function (Request $request) {
    // $request->nom    ==> deconseillé de faire ça car $erqueste vas faire une grande recheche pour trouver nom
    //  il faut faire : $request->input('nom')  pour montrer à $request qu'il doit chercher dans le formulaire
    // dd($request->nom);
    // dd($request->input('nom'));  
    // dd($request->input('nom', 'default value ...')); // si le champ nom est inixistant dans le formulaire dd vas afficher
    //  la valeur par defaut
    // dd($request->string('nom')->upper()); //rendre la cara en majiscul .
    // dd($request->string('nom')->camel()); //pour supprimer le vide et la tabulation
    $request->mergeIfMissing(['mydate' => date('Y-m-d')]);
    dd($request->input('mydate'));
})->name('form');
// ----------------------------------- RESPONSE ------------------------------------------
Route::get('/resp', function () {
    $response = new Response('salamo alaykom', 500);
    return $response;
});
// ----------------------------------- FILE ------------------------------------------
// pour afficher un fichier
Route::get('/file', function () {
    return response()->file('storage/doc/cv-2025.pdf');
});
// ou
Route::get('/file2', function () {
    return response()->download('storage/doc/cv-2025.pdf', disposition: 'inline');
});
// pour télecharger un fichier
Route::get('/file3', function () {
    return response()->download('storage/doc/cv-2025.pdf');
});
// ----------------------------------- COOKIES ------------------------------------------
Route::get('/cookie/set/{cookie}', function ($cookie) {
    $response = new Response();
    // $objectCookie = cookie('name', $cookie, 5);
    $objectCookie = cookie()->forever('name', $cookie);//cookie qui reste un an
    return $response->withCookie($objectCookie);
    // clé , valeur , durée (en minute) .
});
Route::get('/cookie/get', function (Request $request) {
    dd($request->cookie('name'));
});
// ------------------------------- HEADERS ---------------------------------------------
Route::get('/headers', function (Request $request) {
    $response = new Response([
        ['id' => 33, 'name' => 'bouaicha', 'email' => 'b@gmail'],
        ['id' => 24, 'name' => 'rouchdi', 'email' => 'r@gmail'],
        ['id' => 567, 'name' => 'atta', 'email' => 'a@gmail'],
    ]);
    // dd($request->header('Content-Type'));
    return $response->withHeaders([
        'Content-Type' => 'Application/json',
        'X-Bouaicha' => 'Yes',
        // X-...  pour que le navigateur ne prend pas en consideration
    ]);
});
// --------------------------------------- REQUESTS -----------------------------------------
Route::get('/requests', function (Request $request) {
    // dd($request->url()); //afficher l url
    // dd($request->fullUrl()); //afficher l url et les params
    // dd($request->path()); //afficher le path
    // dd($request->is('requests')); //doit retourner true 
    // dd($request->host()); // affiche le serveur recent
    // dd($request->method()); // affiche la methode : get ou post ou delete ...
    // dd($request->isMethod('GET')); // retourne ici true
    dd($request->ip()); // affiche ip
});