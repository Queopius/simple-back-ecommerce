<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminDashboardController;


// Route Admin Login
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])
    ->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login']);

Route::middleware([
    'web'
])->group(function () {
     Route::group(['prefix' => 'admin'], function () {
         Route::post('/logout', [LoginController::class, 'logout'])
            ->name('admin.logout');
         /** Dashboard System */
         Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');
     });
});
