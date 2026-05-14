<?php

use App\Http\Controllers\VipProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('landing');
Route::get('/vip/demo', [VipProfileController::class, 'demo'])->name('vip.profile.demo');
Route::get('/vip/{slug}', [VipProfileController::class, 'show'])->middleware('signed')->name('vip.profile.show');
Route::post('/vip/{slug}/request', [VipProfileController::class, 'sendOtp'])->name('vip.request.send-otp');
Route::post('/vip/{slug}/request/verify', [VipProfileController::class, 'verifyOtp'])->name('vip.request.verify-otp');
