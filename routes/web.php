<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CryptoMarketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TradePartnersController;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $accounts = Auth::user()->accounts;
    return view('dashboard', [
        'accounts' => $accounts
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/accounts', [AccountController::class, 'index'])->middleware(['auth'])->name('accounts');
Route::get('/accounts/{account}/edit', [AccountController::class, 'edit'])->middleware(['auth'])->name('accounts.edit');
Route::put('/accounts/{account}', [AccountController::class, 'update'])->middleware(['auth'])->name('accounts.update');

Route::get('/crypto-market', [CryptoMarketController::class, 'index'])->middleware(['auth'])->name('crypto-market');

Route::get('/trade-partners', [TradePartnersController::class, 'index'])->middleware(['auth'])->name('trade-partners');

require __DIR__.'/auth.php';

