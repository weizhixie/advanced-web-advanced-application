<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SnackController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/snack',[SnackController::class, 'index']);
Route::get('/snack/{snack}', [SnackController::class, 'show']);

Route::get('/add_snack', [SnackController::class, 'create']);
Route::post('/add_snack', [SnackController::class, 'store']);


