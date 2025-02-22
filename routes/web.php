<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FitnessClassController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [FitnessClassController::class, 'index'])->name('home');

Route::name('fitness_classes.')
    ->prefix('fitness_classes')
    ->controller(FitnessClassController::class)
    ->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show')
            ->withoutMiddleware('auth');
        Route::get('/{fitness_class}/edit', 'edit')->name('edit');
        Route::put('/{fitness_class}', 'update')->name('update');
        Route::delete('/{fitness_class}', 'destroy')->name('destroy');
    });

Route::name('booking.')
    ->prefix('booking')
    ->controller(BookingController::class)
    ->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create/{id}', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/booking/{booking}', 'show')->name('show');
    });


require __DIR__ . '/auth.php';
