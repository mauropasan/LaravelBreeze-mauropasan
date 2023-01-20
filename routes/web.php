<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GangaController;
use \App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GangaController::class, 'index'])->name('ganga.index');

Route::get('/ganga/{id}', [GangaController::class, 'show'])->name('ganga.show');

Route::get('/ganga/create', [GangaController::class, 'create'])->name('ganga.create');

Route::post('/ganga/create', [GangaController::class, 'store'])->name('ganga.store');

Route::middleware(['auth', 'CheckGangaOwnership'])->group(function () {
    Route::get('/ganga/{id}/edit', [GangaController::class, 'edit'])->name('ganga.edit');
    Route::patch('/ganga/{id}/edit', [GangaController::class, 'update'])->name('ganga.update');
    Route::get('/ganga/{id}/delete', [GangaController::class, 'destroy'])->name('ganga.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/profile/{username}', [ProfileController::class, 'show'])->middleware('CheckProfile')->name('profile.show');

Route::resource('gangues', GangaController::class)->only(['index', 'show', 'create', 'edit', 'destroy']);

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);
require __DIR__.'/auth.php';
