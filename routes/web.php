<?php

use App\Http\Controllers\Branch;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CampusesController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


        Route::name('programs.')->prefix('/programs')->group(function () {
            Route::get('/', [ProgramController::class, 'index'])->name('index');
            Route::post('/create', [ProgramController::class, 'store'])->name('create');
            Route::post('/edit', [ProgramController::class, 'edit'])->name('edit');
            Route::put('/update/{programs}', [ProgramController::class, 'update'])->name('update');
            Route::post('/delete', [ProgramController::class, 'destroy'])->name('delete');
        });
    
        Route::name('campuses.')->prefix('/campuses')->group(function () {
            Route::get('/', [CampusesController::class, 'index'])->name('index');
            Route::post('/create', [CampusesController::class, 'store'])->name('create');
            Route::post('/edit', [CampusesController::class, 'edit'])->name('edit');
            Route::put('/update/{campuses}', [CampusesController::class, 'update'])->name('update');
            Route::post('/delete', [CampusesController::class, 'destroy'])->name('delete');
        });

        Route::name('intern.')->prefix('/intern')->group(function () {
            Route::get('/', [InternController::class, 'index'])->name('index');
            Route::post('/show', [InternController::class, 'show'])->name('show');
        });

        Route::name('branch.')->prefix('/branch')->group(function () {
            Route::get('/', [BranchController::class, 'index'])->name('index');
        });


});

require __DIR__.'/auth.php';
