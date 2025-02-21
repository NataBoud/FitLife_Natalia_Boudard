<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FitnessClassController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FitnessClassController::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::name('fitness_classes.')
->prefix('fitness_classes')
->controller(FitnessClassController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index')
        ->withoutMiddleware('auth');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show')
        ->withoutMiddleware('auth');
        Route::get('/{fitness_class}/edit', 'edit')->name('edit');
        Route::put('/{fitness_class}', 'update')->name('update');
        Route::delete('/{fitness_class}', 'destroy')->name('destroy');
    });

require __DIR__.'/auth.php';
