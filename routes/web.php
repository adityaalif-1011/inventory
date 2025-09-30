<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('barang', BarangController::class);
});

