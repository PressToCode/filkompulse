<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleAuthController;

Route::get('/', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Google OAUTH Routing (Redirect to Controller)
Route::get('oauth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('login.google');

Route::get('oauth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

// for testing purposes
Route::get('/event-detail', function() {
    return view('event-detail');
});

require __DIR__.'/auth.php';

//dari taqi
use App\Http\Controllers\EventController;
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::patch('/events/{event}/toggle-reminder', [EventController::class, 'toggleReminder'])->name('events.toggleReminder');
Route::patch('/events/{event}/toggle-select', [EventController::class, 'toggleSelect'])->name('events.toggleSelect');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
