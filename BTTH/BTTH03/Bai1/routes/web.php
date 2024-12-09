<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SaleController;

// Route cho medicines
Route::get('medicines', [MedicineController::class, 'index']);

// Route cho sales
Route::get('sales', [SaleController::class, 'index']);