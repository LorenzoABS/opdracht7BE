<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstructeurController;
use App\Http\Controllers\VoertuigController;

Route::get('/', [InstructeurController::class, 'index']);
Route::get('/instructeurs/{id}', [InstructeurController::class, 'show'])->name('instructeurs.show');
Route::get('/voertuigen/{id}/edit', [VoertuigController::class, 'edit'])->name('voertuigen.edit');
Route::put('/voertuigen/{id}', [VoertuigController::class, 'update'])->name('voertuigen.update');
Route::get('/instructeurs/{id}/voertuigen/available', [VoertuigController::class, 'available'])->name('voertuigen.available');
Route::post('/instructeurs/{instructeur}/voertuigen/{voertuig}/assign', [VoertuigController::class, 'assign'])->name('voertuigen.assign');
