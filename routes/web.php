<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Akademik\AkademikController;
use App\Http\Controllers\Akademik\MapelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

// Routes khusus admin
Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
    // Route admin lainnya
});

// Routes khusus akademik
Route::middleware(['role:akademik'])->prefix('akademik')->group(function () {
    // Route to display the main page for the academic section
    Route::get('/', [AkademikController::class, 'index'])->name('akademik.index');
    Route::resource('mapel', MapelController::class);

    
});

// Routes khusus BK
Route::middleware(['role:bk'])->prefix('bk')->group(function () {
    Route::get('/dashboard', [BkController::class, 'dashboard'])->name('bk.dashboard');
    // Route BK lainnya
});

// Routes khusus guru
Route::middleware(['role:guru'])->prefix('guru')->group(function () {
    Route::get('/dashboard', [GuruController::class, 'dashboard'])->name('guru.dashboard');
    // Route guru lainnya
});

// Routes khusus siswa
Route::middleware(['role:siswa'])->prefix('siswa')->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
    // Route siswa lainnya
});
