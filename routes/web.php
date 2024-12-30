<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BayiController;
use App\Http\Controllers\IbuHamilController;

Route::get('/home', function () {
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
    Route::put('/ibu-hamil/{id}', [IbuHamilController::class, 'update'])->name('ibu-hamil.update');
    Route::get('/ibu-hamil/visualisasi', [IbuHamilController::class, 'visualisasi'])->name('ibu-hamil.visualisasi');
    Route::get('/ibu-hamil/export-pdf', [IbuHamilController::class, 'exportPDF'])->name('ibu-hamil.export-pdf');
    Route::delete('{ibuHamil}', [IbuHamilController::class, 'destroy'])->name('ibu-hamil.destroy');
    Route::get('{ibuHamil}', [IbuHamilController::class, 'show'])->name('ibu-hamil.show');
});