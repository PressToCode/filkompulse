<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

// for testing purposes
Route::get('/event-detail', function() {
    return view('event-detail');
});

require __DIR__.'/auth.php';

//

use App\Http\Controllers\CompetitionController;

Route::get('/competition/{id}', [CompetitionController::class, 'show'])->name('competition.show');

//dari taqi
use App\Http\Controllers\EventController;
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::patch('/events/{event}/toggle-reminder', [EventController::class, 'toggleReminder'])->name('events.toggleReminder');
Route::patch('/events/{event}/toggle-select', [EventController::class, 'toggleSelect'])->name('events.toggleSelect');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

