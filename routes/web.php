<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [OrdersController::class, 'index'])->name('dashboard');

    Route::post('/order/create', [OrdersController::class, 'create'])->name('order.create');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/payment/success', [OrdersController::class, 'success'])->name('payment.success');

Route::get('/payment/cancel', function () {
    return view('payment.cancel');
})->name('payment.cancel');

require __DIR__.'/auth.php';
