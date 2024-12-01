<?php

use App\Http\Controllers\Admin\UserGroupController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//authenticated route
Route::get('/login', [AuthenticatedController::class, 'index'])->middleware('guest')->name('login');
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedController::class, 'logout']);
});
//admin rooute
Route::prefix('admin')->group(function () {
    //user group function
    Route::controller(UserGroupController::class)->group(function () {
        Route::get('/user-group', 'index')->name('user_group');
        Route::post('/user-group/save', 'store');
        Route::post('/user-group/list', 'list');
        Route::post('/user-group/edit', 'edit');
        Route::post('/user-group/update', 'update');
        Route::post('/user-group/delete', 'delete');
    });
    //user management route
    Route::controller(UserManagementController::class)->group(function () {
        Route::get('/user-management', 'index')->name('user_management');
        Route::post('/user-management/list', 'list');
        Route::post('/user-management/register', 'registerNewUser');
        Route::post('/user-management/user-active', 'changeUserActive');
    });
});
