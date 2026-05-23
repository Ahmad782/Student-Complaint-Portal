<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;

Route::get('/', [ComplaintController::class, 'home'])->name('home');
Route::get('/complaints/create', [ComplaintController::class, 'create'])->name('complaints.create');
Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');
Route::get('/complaints', [ComplaintController::class, 'index'])->name('complaints.index');
Route::get('/complaints/{complaint}', [ComplaintController::class, 'show'])->name('complaints.show');
Route::patch('/complaints/{complaint}/status', [ComplaintController::class, 'updateStatus'])->name('complaints.status');
