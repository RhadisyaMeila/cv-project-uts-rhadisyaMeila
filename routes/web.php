<?php

use App\Http\Controllers\CVController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CVController::class, 'index']);
Route::get('/pendidikan', [CVController::class, 'pendidikan']);
Route::get('/pengalaman', [CVController::class, 'pengalaman']);
Route::get('/keahlian', [CVController::class, 'keahlian']);
Route::get('/sertifikasi', [CVController::class, 'sertifikasi']);
Route::get('/portofolio', [CVController::class, 'portofolio']);