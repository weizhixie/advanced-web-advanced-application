<?php

use App\Http\Controllers\Auth\GithubController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\SnackController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/auth/github/redirect', [GithubController::class, 'redirect'])->name('github.redirect');
Route::get('/auth/github/callback', [GithubController::class, 'callback'])->name('github.callback');

Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

Route::get('/', [SnackController::class, 'index'])->name('index');

Route::middleware('auth')->group(function (){
    Route::get('/snack/{snack}', [SnackController::class, 'show']);

    Route::get('/add_snack', [SnackController::class, 'create']);
    Route::post('/add_snack', [SnackController::class, 'store']);

    Route::delete('/snack/{snack}', [SnackController::class, 'destroy']);

    Route::get('/snack/{snack}/edit', [SnackController::class, 'edit']);
    Route::patch('/snack/{snack}', [SnackController::class, 'update']);

    //Route::get('/sendMail', [MailController::class, 'welcomeMessage']);

    Route::view('/profile/edit', 'profile.edit')->name('editProfile');
    Route::view('/profile/password', 'profile.password')->name('changePassword');
});
