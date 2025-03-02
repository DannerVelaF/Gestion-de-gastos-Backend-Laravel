<?php

use App\Http\Controllers\BalancesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/balance', [BalancesController::class, 'index'])->name('balance.index');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::post('/transaction', [TransactionsController::class, 'store'])->name('transaction.store');
Route::get('/transaction', [TransactionsController::class, 'index'])->name('transaction.index');
