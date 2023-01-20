<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BalanceTransferController;
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
    return view('dashboard', []);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/accounts', [AccountController::class, 'index'])->middleware(['auth'])->name('accounts');
Route::get('/accounts/{account}/edit', [AccountController::class, 'edit'])->middleware(['auth'])->name('accounts.edit');
Route::put('/accounts/{account}', [AccountController::class, 'update'])->middleware(['auth'])->name('accounts.update');
Route::get('/accounts/add', [AccountController::class, 'showAddAccountForm'])->middleware(['auth'])->name('accounts.add');
Route::post('/accounts/add', [AccountController::class, 'addAccount'])->middleware(['auth'])->name('accounts.add');

Route::get('/balance-transfer', [BalanceTransferController::class, 'showForm'])->middleware(['auth'])->name('balance-transfer.showForm');
Route::post('/balance-transfer', [BalanceTransferController::class, 'transfer'])->middleware(['auth'])->name('balance-transfer');

Route::get('/crypto-market', [CryptoMarketController::class, 'index'])->middleware(['auth'])->name('crypto-market');
Route::post('/crypto-market', [CryptoMarketController::class, 'redirectToCoin'])->middleware(['auth'])->name('crypto-market');
Route::get('/crypto-market/{coin}', [CryptoMarketController::class, 'show'])->middleware(['auth']);

Route::get('/trade-partners', [TradePartnersController::class, 'index'])->middleware(['auth'])->name('trade-partners');
Route::post('/trade-partners', [TradePartnersController::class, 'redirectToPartner'])->middleware(['auth'])->name('trade-partners.show');
Route::get('/trade-partners/{partner}', [TradePartnersController::class, 'show'])->middleware(['auth'])->name('trade-partners.show');

require __DIR__.'/auth.php';

