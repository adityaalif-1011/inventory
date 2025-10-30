<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\PenjualanController;

Route::get('/', function () {
    return view('home');
});

// Pengadaan
Route::get('/pengadaan', [PengadaanController::class,'index'])->name('pengadaan.index');
Route::get('/pengadaan/{id}', [PengadaanController::class,'show'])->name('pengadaan.show');
Route::get('/pengadaan/create', [PengadaanController::class,'create'])->name('pengadaan.create');
Route::post('/pengadaan', [PengadaanController::class,'store'])->name('pengadaan.store');

// Penerimaan
Route::get('/penerimaan', [PenerimaanController::class,'index'])->name('penerimaan.index');
Route::get('/penerimaan/{id}', [PenerimaanController::class,'show'])->name('penerimaan.show');
Route::get('/penerimaan/create', [PenerimaanController::class,'create'])->name('penerimaan.create');
Route::post('/penerimaan', [PenerimaanController::class,'store'])->name('penerimaan.store');

// Penjualan
Route::get('/penjualan', [PenjualanController::class,'index'])->name('penjualan.index');
Route::get('/penjualan/{id}', [PenjualanController::class,'show'])->name('penjualan.show');
Route::get('/penjualan/create', [PenjualanController::class,'create'])->name('penjualan.create');
Route::post('/penjualan', [PenjualanController::class,'store'])->name('penjualan.store');
