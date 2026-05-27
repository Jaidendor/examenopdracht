<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

// ==================== PUBLIEKE ROUTES ====================

// Homepagina
Route::get('/', function () {
    return view('home');
})->name('home');

// Loginpagina (GET: toon het formulier)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Login verwerken (POST: verwerk het formulier)
Route::post('/login', [AuthController::class, 'login']);

// Uitloggen (POST: beveiligd met CSRF)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
