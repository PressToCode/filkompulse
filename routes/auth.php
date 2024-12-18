<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventSubmissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

// Google OAUTH Routing (Redirect to Controller)
Route::get('oauth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('oauth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware([AuthCheck::class])->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //dari taqi
    Route::get('/collections', [CollectionController::class, 'index'])->name('collections.index');
    Route::patch('/collections/{collection}/toggle-reminder', [CollectionController::class, 'toggleReminder'])->name('collections.toggleReminder');
    Route::patch('/collections/{collection}/toggle-select', [CollectionController::class, 'toggleSelect'])->name('collections.toggleSelect');
    Route::delete('/collections/{collection}', [CollectionController::class, 'destroy'])->name('collections.destroy');

    Route::post('/add-to-collection/{competition}', [EventController::class, 'addToCollection'])->name('event.addToCollection');

    Route::get('/event-submissions', [EventSubmissionController::class, 'index'])->name('event-submissions.index');
    Route::get('/event-submissions/create', [EventSubmissionController::class, 'create'])->name('event-submissions.create');
    Route::post('/event-submissions', [EventSubmissionController::class, 'store'])->name('event-submissions.store');
    Route::get('/event-submissions/{event}', [EventSubmissionController::class, 'show'])->name('event-submissions.show');
    Route::get('/event-submissions/edit/{event}', [EventSubmissionController::class, 'edit'])->name('event-submissions.edit');
    Route::put('/event-submissions/{event}', [EventSubmissionController::class, 'update'])->name('event-submissions.update');
    Route::delete('/event-submissions/{event}', [EventSubmissionController::class, 'destroy'])->name('event-submissions.destroy');

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::delete( '/admin/dashboard/delete-event/{event}', [AdminController::class, 'deleteEvent'])->name('admin.delete-event');

    Route::get('/get-verified', [AdminController::class, 'getVerified'])->name('admin.get-verified');
    Route::post('/get-verified/send', [AdminController::class, 'sendVerifyRequest'])->name('admin.sendVerifyRequest');
    Route::put('/verify-user/{user}', [AdminController::class, 'verifyUser'])->name('admin.verify-user');
    Route::put('/unverify-user/{user}', [AdminController::class, 'unverifyUser'])->name('admin.unverify-user');
});
