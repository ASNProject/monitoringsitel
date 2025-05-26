<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Exports\MonitoringExport;
use Maatwebsite\Excel\Facades\Excel;

 
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'login'])->name('login.post');
Route::get('registration', [AuthController::class, 'register'])->name('register');
Route::post('post-registration', [AuthController::class, 'registerUser'])->name('register.post');
Route::middleware(['auth'])->get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->get('/home', [DashboardController::class, 'home'])->name('dashboard.home');
Route::middleware(['auth'])->get('/data', [DashboardController::class, 'data'])->name('dashboard.data');

Route::get('/export-monitoring', function () {
    return Excel::download(new MonitoringExport, 'Monitoring.xlsx');
});
Route::delete('/delete-monitoring', [DashboardController::class, 'deleteAll'])->name('monitoring.deleteAll');