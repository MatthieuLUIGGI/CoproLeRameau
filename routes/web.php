<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ResolutionController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\Admin\DashboardController;


// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentification
require __DIR__.'/auth.php';

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {
    // Dashboard utilisateur (route manquante pour la redirection après login)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profil utilisateur
// Modifiez le groupe de routes profile comme ceci :
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
        Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Réunions
    Route::get('/meetings', [MeetingController::class, 'index'])->name('meetings.index');

    // Résolutions
    Route::get('/resolutions', [ResolutionController::class, 'index'])->name('resolutions.index');

    // Votes utilisateur
    Route::get('/votes', [VoteController::class, 'index'])->name('votes.index');
    Route::post('/votes/{resolution}/vote', [VoteController::class, 'vote'])->name('votes.submit');
    Route::get('/votes/{resolution}/results', [VoteController::class, 'results'])->name('votes.results');
});

// Routes admin protégées par le middleware 'auth' et 'admin'
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Tableau de bord admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Gestion des utilisateurs
    Route::get('/users', [DashboardController::class, 'users'])->name('admin.users');
    Route::get('/users/{user}/edit', [DashboardController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/users/{user}/update', [DashboardController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{user}/delete', [DashboardController::class, 'deleteUser'])->name('admin.users.delete');

    // Gestion des réunions
    Route::get('/meetings', [MeetingController::class, 'adminIndex'])->name('admin.meetings');
    Route::get('/meetings/create', [MeetingController::class, 'create'])->name('admin.meetings.create');
    Route::post('/meetings/store', [MeetingController::class, 'store'])->name('admin.meetings.store');
    Route::get('/meetings/{meeting}/edit', [MeetingController::class, 'edit'])->name('admin.meetings.edit');
    Route::put('/meetings/{meeting}/update', [MeetingController::class, 'update'])->name('admin.meetings.update');
    Route::delete('/meetings/{meeting}/delete', [MeetingController::class, 'destroy'])->name('admin.meetings.delete');

    // Gestion des résolutions
    Route::get('/resolutions', [ResolutionController::class, 'adminIndex'])->name('admin.resolutions');
    Route::get('/resolutions/create', [ResolutionController::class, 'create'])->name('admin.resolutions.create');
    Route::post('/resolutions/store', [ResolutionController::class, 'store'])->name('admin.resolutions.store');
    Route::get('/resolutions/{resolution}/edit', [ResolutionController::class, 'edit'])->name('admin.resolutions.edit');
    Route::put('/resolutions/{resolution}/update', [ResolutionController::class, 'update'])->name('admin.resolutions.update');
    Route::delete('/resolutions/{resolution}/delete', [ResolutionController::class, 'destroy'])->name('admin.resolutions.delete');

    // Gestion des votes admin
    Route::get('/votes', [VoteController::class, 'adminIndex'])->name('admin.votes');
});

// Pages légales
Route::view('/mentions-legales', 'legal')->name('legal');
Route::view('/politique-confidentialite', 'privacy')->name('privacy');
Route::view('/cgu', 'terms')->name('terms');
Route::view('/rgpd', 'rgpd')->name('rgpd');
