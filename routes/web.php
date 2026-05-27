<?php

use Illuminate\Support\Facades\Route;

// ==================== PUBLIEKE ROUTES ====================

// Homepagina
Route::get('/', function () {
    return view('home');
})->name('home');

// Loginpagina (GET: toon het formulier)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Login verwerken (POST: verwerk het formulier)
// Dit wordt later ingevuld als de backend klaar is
Route::post('/login', function () {
    // TODO: login logica implementeren
})->name('login.post');
