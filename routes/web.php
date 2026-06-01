<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
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

// Uitlegpagina
Route::get('/uitleg', function () {
    return view('uitleg');
})->name('uitleg');

// Contactpagina
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function () {
    return redirect()->route('contact')->with('success', 'Bericht succesvol verzonden.');
})->name('contact.store');

// Reviewpagina (GET: om de pagina te bekijken, POST: om een review te versturen, DELETE: om te verwijderen)
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

// Registerpagina (GET: toon het formulier)
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Registratie verwerken (POST: sla nieuwe gebruiker op)
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Uitloggen (POST: beveiligd met CSRF)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
