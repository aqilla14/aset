<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/aset', [AsetController::class, 'index'])->name('aset.index');
Route::get('/aset/create', [AsetController::class, 'create'])->name('aset.create');
Route::post('/aset', [AsetController::class, 'store'])->name('aset.store');
Route::get('/aset/{aset}', [AsetController::class, 'show'])->name('aset.show');
Route::get('/aset/{aset}/edit', [AsetController::class, 'edit'])->name('aset.edit');
Route::put('/aset/{aset}', [AsetController::class, 'update'])->name('aset.update');
Route::delete('/aset/{aset}', [AsetController::class, 'destroy'])->name('aset.destroy');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');
Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
Route::get('/ruangan/create', [RuanganController::class, 'create'])->name('ruangan.create');
Route::post('/ruangan', [RuanganController::class, 'store'])->name('ruangan.store');
Route::get('/ruangan/{ruangan}', [RuanganController::class, 'show'])->name('ruangan.show');
Route::get('/ruangan/{ruangan}/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
Route::put('/ruangan/{ruangan}', [RuanganController::class, 'update'])->name('ruangan.update');
Route::delete('/ruangan/{ruangan}', [RuanganController::class, 'destroy'])->name('ruangan.destroy');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier/{supplier}', [SupplierController::class, 'show'])->name('supplier.show');
Route::get('/supplier/{supplier}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::put('/supplier/{supplier}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/{supplier}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('/peminjaman/{peminjaman}', [PeminjamanController::class, 'show'])->name('peminjaman.show');
Route::get('/peminjaman/{peminjaman}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::put('/peminjaman/{peminjaman}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
Route::delete('/peminjaman/{peminjaman}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');


Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');
Route::get('/pengembalian/create', [PengembalianController::class, 'create'])->name('pengembalian.create');
Route::post('/pengembalian', [PengembalianController::class, 'store'])->name('pengembalian.store');
Route::get('/pengembalian/{pengembalian}', [PengembalianController::class, 'show'])->name('pengembalian.show');
Route::get('/pengembalian/{pengembalian}/edit', [PengembalianController::class, 'edit'])->name('pengembalian.edit');
Route::put('/pengembalian/{pengembalian}', [PengembalianController::class, 'update'])->name('pengembalian.update');
Route::delete('/pengembalian/{pengembalian}', [PengembalianController::class, 'destroy'])->name('pengembalian.destroy');


Route::get('/pemeliharaan', [PemeliharaanController::class, 'index'])->name('pemeliharaan.index');
Route::get('/pemeliharaan/create', [PemeliharaanController::class, 'create'])->name('pemeliharaan.create');
Route::post('/pemeliharaan', [PemeliharaanController::class, 'store'])->name('pemeliharaan.store');
Route::get('/pemeliharaan/{pemeliharaan}', [PemeliharaanController::class, 'show'])->name('pemeliharaan.show');
Route::get('/pemeliharaan/{pemeliharaan}/edit', [PemeliharaanController::class, 'edit'])->name('pemeliharaan.edit');
Route::put('/pemeliharaan/{pemeliharaan}', [PemeliharaanController::class, 'update'])->name('pemeliharaan.update');
Route::delete('/pemeliharaan/{pemeliharaan}', [PemeliharaanController::class, 'destroy'])->name('pemeliharaan.destroy');
