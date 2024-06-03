<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KastratController;
use App\Http\Controllers\ProfileController;
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
});

Route::get('/kastrat', [KastratController::class, 'index'])->name('kastrat.index');
Route::get('/kastrat/{id}', [KastratController::class, 'edit'])->name('kastrat.edit');
Route::patch('/kastrat', [KastratController::class, 'update'])->name('kastrat.update');
Route::delete('/kastrat', [KastratController::class, 'destroy'])->name('kastrat.destroy');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::patch('/admin', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin', [AdminController::class, 'destroy'])->name('admin.destroy');



require __DIR__ . '/auth.php';
