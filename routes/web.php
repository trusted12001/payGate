<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\POSController;
use App\Http\Controllers\TaxProfileController;
use App\Http\Controllers\HomeController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/pay', function () {
    return view('pay'); // Create a corresponding view (resources/views/pay.blade.php)
})->name('pay');

Route::get('/validate', function () {
    return view('validate'); // Create a corresponding view (resources/views/validate.blade.php)
})->name('validate');

Route::get('/contact', function () {
    return view('contact'); // Create a corresponding view (resources/views/contact.blade.php)
})->name('contact');



Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/tax-profile/create', [TaxProfileController::class, 'create'])->name('tax-profile.create');
    Route::post('/tax-profile/store', [TaxProfileController::class, 'store'])->name('tax-profile.store');
    Route::get('/tax-profile/edit', [TaxProfileController::class, 'edit'])->name('tax-profile.edit');
    Route::post('/tax-profile/update', [TaxProfileController::class, 'update'])->name('tax-profile.update');
    Route::resource('tax-profile', TaxProfileController::class);

    Route::prefix('payments')->name('payments.')->group(function () {
        Route::get('/history', [\App\Http\Controllers\PaymentController::class, 'history'])->name('history');
        Route::get('/make', [\App\Http\Controllers\PaymentController::class, 'selectProfile'])->name('select');
        Route::get('/pay/{profile}', [\App\Http\Controllers\PaymentController::class, 'makePayment'])->name('make');
        Route::post('/process', [\App\Http\Controllers\PaymentController::class, 'processPayment'])->name('process');
        Route::get('/receipt/{payment}', [\App\Http\Controllers\PaymentController::class, 'printReceipt'])->name('receipt');
    });
});


Route::middleware(['auth', 'role:Super Admin'])->prefix('admin')->name('admin.')->group(function () {
    // User management
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

    // POS Machines
    Route::resource('pos', \App\Http\Controllers\Admin\POSController::class);

    // Revenue Settings
    Route::resource('revenue_settings', \App\Http\Controllers\Admin\RevenueSettingController::class);

    // Mining Sites
    Route::resource('mining_sites', \App\Http\Controllers\Admin\MiningSiteController::class);

    // Mineral Deposits
    Route::resource('mineral_deposits', \App\Http\Controllers\Admin\MineralDepositController::class);

});


require __DIR__.'/auth.php';
