<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BayiController;

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
