<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index']);

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
use App\Http\Controllers\EventController;

Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');
Route::get('/event/type/{type}', [EventController::class, 'showType'])->name('event.type');
Route::post('/add-to-collection/{competition}', [EventController::class, 'addToCollection'])->name('event.addToCollection');



//dari taqi
use App\Http\Controllers\CollectionController;
Route::get('/collections', [CollectionController::class, 'index'])->name('collections.index');
Route::patch('/collections/{collection}/toggle-reminder', [CollectionController::class, 'toggleReminder'])->name('collections.toggleReminder');
Route::patch('/collections/{collection}/toggle-select', [CollectionController::class, 'toggleSelect'])->name('collections.toggleSelect');
Route::delete('/collections/{collection}', [CollectionController::class, 'destroy'])->name('collections.destroy');

use App\Http\Controllers\EventSubmissionController;

Route::get('/event-submissions', [EventSubmissionController::class, 'index'])->name('event-submissions.index');
    Route::get('/event-submissions/create', [EventSubmissionController::class, 'create'])->name('event-submissions.create');
    Route::post('/event-submissions', [EventSubmissionController::class, 'store'])->name('event-submissions.store');
    Route::get('/event-submissions/{event}', [EventSubmissionController::class, 'show'])->name('event-submissions.show');
    Route::get('/event-submissions/{event}/edit', [EventSubmissionController::class, 'edit'])->name('event-submissions.edit');
    Route::put('/event-submissions/{event}', [EventSubmissionController::class, 'update'])->name('event-submissions.update');
    Route::delete('/event-submissions/{event}', [EventSubmissionController::class, 'destroy'])->name('event-submissions.destroy');