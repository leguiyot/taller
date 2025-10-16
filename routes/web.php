<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::resource('clients', ClientController::class);
Route::resource('vehicles', VehicleController::class);
Route::resource('parts', PartController::class);
Route::resource('quotes', QuoteController::class);
Route::resource('work-orders', WorkOrderController::class);
Route::resource('invoices', InvoiceController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

require __DIR__.'/auth.php';
