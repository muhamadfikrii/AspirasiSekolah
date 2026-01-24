<?php

use App\Models\Aspiration;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AspirationController;

Route::get('/', function () {
    return view('auth.login');
});
Route::post('/', [AuthController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('auth.register');
});
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::patch('/aspiration/{id}/proses', [AspirationController::class, 'setProses'])
    ->name('aspiration.proses');
Route::patch('/aspiration/{id}/selesai', [AspirationController::class, 'setSelesai'])
    ->name('aspiration.selesai');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index');
    Route::patch('/dashboard/{id}', [DashboardController::class, 'update'])
    ->name('dashboard.update');
    Route::get('/dashboard/{id}/feedback', [DashboardController::class, 'createFeedback'])
    ->name('dashboard.feedback.create');
    Route::post('/dashboard/feedback', [DashboardController::class, 'storeFeedback'])
    ->name('dashboard.feedback.store');
});

Route::group(['middleware' => ['auth', 'checkRole:siswa']], function() {
    Route::get('/home', [AspirationController::class, 'index'])->name('student.index');
    Route::post('/home', [AspirationController::class, 'store'])->name('student.store');
    Route::get('/aspiration/{id}', [AspirationController::class, 'show'])->name('student.show');
});