<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\TenagaKerjaController;
use App\Http\Controllers\TatatertibController;

use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\SopController;
use App\Http\Controllers\EbookController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\NewsManagementController;



Route::get('/', [NewsController::class, 'index'])->name('home'); // Menampilkan daftar berita di halaman awal
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show'); // Menampilkan detail berita

Route::get('/profil/identitas', [IdentitasController::class, 'index'])->name('template.identitas');
Route::get('/profil/sejarah', [SejarahController::class, 'index'])->name('template.sejarah');
Route::get('/profil/visi', [VisiController::class, 'index'])->name('template.visi');
Route::get('/profil/struktur', [StrukturController::class, 'index'])->name('template.struktur');
Route::get('/profil/tenagakerja', [TenagaKerjaController::class, 'index'])->name('template.tenagakerja');
Route::get('/profil/tatatertib', [TatatertibController::class, 'index'])->name('template.tatatertib');

Route::get('/akademik/kurikulum', [KurikulumController::class, 'index'])->name('akademik.kurikulum');
Route::get('/akademik/kalender', [KalenderController::class, 'index'])->name('akademik.kalender');

Route::get('/tatausaha/sop', [SopController::class, 'index'])->name('tatausaha.sop');
Route::get('/tatausaha/ebook', [EbookController::class, 'index'])->name('tatausaha.ebook');




Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::prefix('dashboard/news')->name('dashboard.news.')->group(function () {
    Route::get('/create', [NewsManagementController::class, 'create'])->name('create');
    Route::post('/store', [NewsManagementController::class, 'store'])->name('store');
    Route::delete('/{news}', [NewsManagementController::class, 'destroy'])->name('destroy'); // Route untuk hapus berita
    Route::get('/{news}/edit', [NewsManagementController::class, 'edit'])->name('edit');
    Route::put('/{news}', [NewsManagementController::class, 'update'])->name('update');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
