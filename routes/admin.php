<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UsersController;
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
        /**
         * Route Users List
         */
        Route::group(['prefix' => '/users'], function () {
            Route::get('/form', [UsersController::class, 'create'])
                ->name('admin.users.create');
            Route::patch('/', [UsersController::class, 'store'])
                ->name('admin.users.store');
            Route::get('/{user}/form', [UsersController::class, 'edit'])
                ->name('admin.users.edit');
            Route::patch('/{user}', [UsersController::class, 'update'])
                ->name('admin.users.update');
            Route::get('/trash', [UsersController::class, 'index'])
                ->name('admin.users.trashed');
            Route::patch('/trash/{user}', [UsersController::class, 'trash'])
                ->name('admin.users.trash');
            Route::get('/{id}/restore', [UsersController::class, 'restore'])
                ->name('admin.users.restore')
                ->where('id', '[0-9]+');
            Route::delete('{id}/delete', [UsersController::class, 'destroy'])
                ->name('admin.users.destroy')
                ->where('id', '[0-9]+');
            Route::get('/', [UsersController::class, 'index'])
                ->name('admin.users')
                ->middleware('cache_response');
        });
     });
});
