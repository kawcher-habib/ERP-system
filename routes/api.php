<?php

use App\Http\Controllers\Authentication\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

/**
 *   User 
 * 
 */

 Route::get('/users', [AuthController::class, 'index']);
 Route::post('/reg', [AuthController::class,  'registration']);
