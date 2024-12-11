<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

// for testing purposes
// TODO: BLOCK W/ MIDDLEWARE LATER!!!
Route::get('/event-detail', function() {
    return view('event-detail');
});

// TODO: Change Routing Implementation cuz this suck asf
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search-suggestion', [SearchController::class, 'suggest'])->name('search.suggest');

require __DIR__.'/auth.php';

// Andhika's Route
use App\Http\Controllers\CompetitionController;
Route::get('/competition/{id}', [CompetitionController::class, 'show'])->name('competition.show');

//dari taqi
use App\Http\Controllers\EventController;
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::patch('/events/{event}/toggle-reminder', [EventController::class, 'toggleReminder'])->name('events.toggleReminder');
Route::patch('/events/{event}/toggle-select', [EventController::class, 'toggleSelect'])->name('events.toggleSelect');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

