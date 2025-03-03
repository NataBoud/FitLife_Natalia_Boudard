<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [CoursController::class, 'index'])->name('home');

Route::name('cours.')
    ->prefix('cours')
    ->controller(CoursController::class)
    ->group(function () {
        Route::get('/{id}', 'show')->name('show');
    });

Route::name('reservation.')
    ->prefix('reservation')
    ->controller(ReservationController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/{cours}', 'create')->name('create');
        Route::post('/{cours}/store', 'store')->name('store');
        Route::get('/{reservation}/show', 'show')->name('show');
    });


require __DIR__ . '/auth.php';
