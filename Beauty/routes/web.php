<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
use App\Http\Controllers\PagesController;

Route::get("/", [PagesController::class, 'index']);
Route::get('/appointments', [PagesController::class, 'appointments']);
Route::get('/aboutUs', [PagesController::class, 'aboutUs']);
Route::get('/gallery', [PagesController::class, 'gallery']);
Route::get('/staff', [PagesController::class, 'staff']);