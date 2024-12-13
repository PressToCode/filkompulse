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

