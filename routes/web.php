<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BayiController;
use App\Http\Controllers\PerkembanganBayiController;
use App\Http\Controllers\IbuHamilController;
use App\Http\Controllers\ImunisasiController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::prefix('bayi')->group(function () {
    Route::get('/', [bayiController::class, 'index'])->name('bayi.index');
    Route::get('create', [bayiController::class, 'create'])->name('bayi.create');
    Route::post('/bayi', [bayiController::class, 'store'])->name('bayi.store'); 
    Route::get('{id}/edit', [bayiController::class, 'edit'])->name('bayi.edit');
    Route::put('{id}', [bayiController::class, 'update'])->name('bayi.update');
    Route::delete('{id}', [bayiController::class, 'destroy'])->name('bayi.destroy');
    Route::get('{id}', [bayiController::class, 'showDetail'])->name('bayi.showDetail');
    
});

// Route untuk Ibu Hamil
Route::prefix('ibu-hamil')->group(function () {
    Route::get('/', [IbuHamilController::class, 'index'])->name('ibu-hamil.index');
    Route::get('create', [IbuHamilController::class, 'create'])->name('ibu-hamil.create');
    Route::post('/', [IbuHamilController::class, 'store'])->name('ibu-hamil.store'); 
    Route::get('{ibuHamil}/edit', [IbuHamilController::class, 'edit'])->name('ibu-hamil.edit');
    Route::put('{ibuHamil}', [IbuHamilController::class, 'update'])->name('ibu-hamil.update');
    Route::delete('{ibuHamil}', [IbuHamilController::class, 'destroy'])->name('ibu-hamil.destroy');
    Route::get('{ibuHamil}', [IbuHamilController::class, 'show'])->name('ibu-hamil.show');
});

// Route untuk perkembangan Bayi
Route::prefix('perkembanganbayi')->group(function () {
    Route::get('/', [PerkembanganBayiController::class, 'index'])->name('perkembanganbayi.index');
    Route::get('create', [PerkembanganBayiController::class, 'create'])->name('perkembanganbayi.create');
    Route::post('/', [PerkembanganBayiController::class, 'store'])->name('perkembanganbayi.store');
    Route::get('{perkembanganBayi}/edit', [PerkembanganBayiController::class, 'edit'])->name('perkembanganbayi.edit');
    Route::put('{perkembanganBayi}', [PerkembanganBayiController::class, 'update'])->name('perkembanganbayi.update');
    Route::delete('{perkembanganBayi}', [PerkembanganBayiController::class, 'destroy'])->name('perkembanganbayi.destroy');
    Route::get('{perkembanganBayi}', [PerkembanganBayiController::class, 'show'])->name('perkembanganbayi.show');
});

// Routes for Immunisasi
Route::prefix('imunisasi')->group(function () {
    Route::get('/imunisasi/visual', [ImunisasiController::class, 'visualisasi'])->name('imunisasi.visual');
    Route::get('/imunisasi', [ImunisasiController::class, 'index'])->name('imunisasi.index');
    Route::get('create', [ImunisasiController::class, 'create'])->name('imunisasi.create');
    Route::post('/', [ImunisasiController::class, 'store'])->name('imunisasi.store');
    Route::get('{imunisasi}/edit', [ImunisasiController::class, 'edit'])->name('imunisasi.edit');
    Route::put('{imunisasi}', [ImunisasiController::class, 'update'])->name('imunisasi.update');
    Route::delete('{imunisasi}', [ImunisasiController::class, 'destroy'])->name('imunisasi.destroy');
    Route::get('{imunisasi}', [ImunisasiController::class, 'show'])->name('imunisasi.show');
});


