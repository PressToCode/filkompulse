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

//Andhika
use App\Http\Controllers\CompetitionController;

Route::get('/competitions/{id}', [CompetitionController::class, 'show'])->name('competitions.show');
Route::get('/competitions/type/{type}', [CompetitionController::class, 'showType'])->name('competitions.type');
Route::post('/add-to-collection/{competition}', [CompetitionController::class, 'addToCollection'])->name('competitions.addToCollection');



//dari taqi
use App\Http\Controllers\EventController;
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::patch('/events/{event}/toggle-reminder', [EventController::class, 'toggleReminder'])->name('events.toggleReminder');
Route::patch('/events/{event}/toggle-select', [EventController::class, 'toggleSelect'])->name('events.toggleSelect');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

