<?php

use App\Http\Controllers\API\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });


// routes/api.php
Route::get('/api1', function () {
    return response()->json(['message' => 'Hello from API']);
    // la reponse est dans ce lien : http://127.0.0.1:8000/api/api1
});

Route::apiResource('customers', CustomerController::class);
// Route::Apiget('/apia', function (Request $request) {
//     dd($request->cookie('name'));
// });