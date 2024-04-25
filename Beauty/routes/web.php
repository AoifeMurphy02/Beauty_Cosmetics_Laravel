<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StaffController;

Route::get("/", [PagesController::class, 'index']);
Route::get('/appointments', [PagesController::class, 'appointments']);
Route::get('/aboutUs', [PagesController::class, 'aboutUs']);
Route::get('/gallery', [PagesController::class, 'gallery']);
Route::get('/staff', [StaffController::class, 'index']);
Route::get('/staff', [StaffController::class, 'index'])->name('staff');
Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');