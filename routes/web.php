<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SnackController;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [SnackController::class, 'index'])->name('index');

Route::middleware('auth')->group(function (){
    Route::get('/snack/{snack}', [SnackController::class, 'show']);

    Route::get('/add_snack', [SnackController::class, 'create']);
    Route::post('/add_snack', [SnackController::class, 'store']);

    Route::delete('/snack/{snack}', [SnackController::class, 'destroy']);

    Route::get('/snack/{snack}/edit', [SnackController::class, 'edit']);
    Route::patch('/snack/{snack}', [SnackController::class, 'update']);
});
