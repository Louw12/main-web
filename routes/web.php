<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Akademik\AkademikController;
use App\Http\Controllers\Akademik\MapelController;
use App\Http\Controllers\Akademik\GuruController;
use App\Http\Controllers\MainpageController;
use App\Http\Controllers\Admin\BeritaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Akademik\KelasController;
use App\Http\Controllers\Akademik\StudenController;
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
Route::get('/bk',[MainpageController::class, 'bkpage'])->name('bkpage');
Route::get('/', [MainpageController::class, 'landing']);
Route::get('/berita', [BeritaController::class, 'listPublic'])->name('public.berita.show');
Route::get('/berita/{slug}', [BeritaController::class, 'showPublic'])->name('public.berita.show');


Auth::routes();

// Routes khusus admin
Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
    Route::resource('berita', BeritaController::class);
    
});



// Routes khusus akademik
Route::middleware(['role:akademik'])->prefix('akademik')->group(function () {
    // Route to display the main page for the academic section
    Route::get('/', [AkademikController::class, 'index'])->name('akademik.index');
    Route::resource('mapel', MapelController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kode_kelas']);
    // Route::resource('studen', StudenController::class)->parameters(['studen' => 'id']);
    Route::get('/studen', [StudenController::class, 'index'])->name('akademik.studen.index');
    Route::get('/studen/create', [StudenController::class, 'create'])->name('akademik.studen.create');
    Route::post('/studen', [StudenController::class, 'store'])->name('akademik.studen.store');
    Route::get('/studen/{id}/edit', [StudenController::class, 'edit'])->name('akademik.studen.edit');
    Route::put('/studen/{id}', [StudenController::class, 'update'])->name('akademik.studen.update');
    Route::delete('/studen/{id}', [StudenController::class, 'destroy'])->name('akademik.studen.destroy');

    
});

// Routes khusus BK
Route::middleware(['role:bk'])->prefix('bk')->group(function () {
    //Route::get('/dashboard', [BkController::class, 'dashboard'])->name('bk.dashboard');
    // Route BK lainnya
});

// Routes khusus guru
Route::middleware(['role:guru'])->prefix('guru')->group(function () {
    Route::get('/dashboard', [GuruController::class, 'dashboard'])->name('guru.dashboard');
    // Route guru lainnya
});

// Routes khusus siswa
Route::middleware(['role:siswa'])->prefix('siswa')->group(function () {
   // Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
    // Route siswa lainnya
});
