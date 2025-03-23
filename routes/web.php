<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LatticeGameController;
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [LatticeGameController::class, 'index']);


//Route::middleware(['auth'])->group(function () {
    Route::get('/game', [LatticeGameController::class, 'index'])->name('game');
    Route::post('/game/validate', [LatticeGameController::class, 'validateGrid'])->name('game.validate');
//});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
