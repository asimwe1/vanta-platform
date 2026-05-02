<?php

use App\Http\Controllers\VipProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');
Route::get('/vip/{slug}', [VipProfileController::class, 'show'])->name('vip.profile.show');
