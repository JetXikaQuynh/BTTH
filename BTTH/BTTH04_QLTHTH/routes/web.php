<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\IssueController;
// Route::get('/issues', [IssueController::class, 'index'])->name('issues.index');
// // Route::resource('computers', ComputerController::class);
Route::resource('issues', IssueController::class);



