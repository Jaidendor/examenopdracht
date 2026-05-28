<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ==================== PUBLIEKE ROUTES ====================

// Homepagina
Route::get('/', function () {
    return view('home');
})->name('home');

// Loginpagina (GET: toon het formulier)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Login verwerken (POST: verwerk het formulier)
Route::post('/login', [AuthController::class, 'login']);

// Registerpagina (GET: toon het formulier)
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Registratie verwerken (POST: sla nieuwe gebruiker op)
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Uitloggen (POST: beveiligd met CSRF)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
