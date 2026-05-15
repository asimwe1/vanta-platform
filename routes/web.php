<?php

use App\Http\Controllers\CardInquiryController;
use App\Http\Controllers\VipProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('landing');
Route::get('/cards', [CardInquiryController::class, 'index'])->name('cards.index');
Route::post('/cards/inquiry', [CardInquiryController::class, 'store'])->name('cards.inquiry.store');
Route::get('/vip/demo', [VipProfileController::class, 'demo'])->name('vip.profile.demo');
Route::get('/vip/{slug}', [VipProfileController::class, 'show'])->middleware('signed')->name('vip.profile.show');
Route::post('/vip/{slug}/request', [VipProfileController::class, 'sendOtp'])->name('vip.request.send-otp');
Route::post('/vip/{slug}/request/verify', [VipProfileController::class, 'verifyOtp'])->name('vip.request.verify-otp');
Route::get('/{brandSlug}', [VipProfileController::class, 'showBrand'])
    ->where('brandSlug', '^(?!admin$|cards$|vip$|livewire$|storage$|build$)[A-Za-z0-9-]+$')
    ->name('brand.public.show');
Route::get('/{brandSlug}/{vipSlug}', [VipProfileController::class, 'showForBrand'])->middleware('signed')->name('vip.profile.brand.show');
