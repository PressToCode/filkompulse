<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReminderController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'filter'])->name('dashboard.filter');

Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search/filter', [SearchController::class, 'filter'])->name('search.filter');
Route::get('/search-suggestion', [SearchController::class, 'suggest'])->name('search.suggest');

require __DIR__.'/auth.php';

//Andhika
use App\Http\Controllers\EventController;

Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');
Route::get('/event/type/{type}', [EventController::class, 'showType'])->name('event.type');

Route::get('/reminder/send/{id}', [ReminderController::class, 'sendReminder'])->name('reminder.send');