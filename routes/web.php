<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
 
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'login'])->name('login.post');
Route::get('registration', [AuthController::class, 'register'])->name('register');
Route::post('post-registration', [AuthController::class, 'registerUser'])->name('register.post');
Route::middleware(['auth'])->get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');