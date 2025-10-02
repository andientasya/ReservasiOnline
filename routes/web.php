<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\DirectPasswordResetController;
use Illuminate\Support\Facades\Route;
use App\Models\Reservation;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $userId = auth()->id();
    
    $totalReservations = Reservation::where('user_id', $userId)->count();
    
    $pendingReservations = Reservation::where('user_id', $userId)
        ->where('status', 'pending')
        ->count();
    
    $completedReservations = Reservation::where('user_id', $userId)
        ->whereIn('status', ['confirmed', 'completed'])
        ->count();
    
    $averageRating = Reservation::where('user_id', $userId)
        ->whereNotNull('rating')
        ->avg('rating');
    
    $averageRating = $averageRating ? round($averageRating, 1) : 5.0;
    
    $recentActivities = Reservation::where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();
    
    return view('dashboard', compact(
        'totalReservations',
        'pendingReservations',
        'completedReservations',
        'averageRating',
        'recentActivities'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

// Route Reset Password Langsung (Tanpa Email)
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [DirectPasswordResetController::class, 'showResetForm'])
        ->name('password.request');
    
    Route::post('/reset-password', [DirectPasswordResetController::class, 'reset'])
        ->name('password.direct-reset');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('reservations', ReservationController::class);
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/reservations', [AdminController::class, 'reservations'])->name('reservations');
    Route::patch('/reservations/{reservation}/status', [AdminController::class, 'updateStatus'])->name('reservations.status');
});

require __DIR__.'/auth.php';