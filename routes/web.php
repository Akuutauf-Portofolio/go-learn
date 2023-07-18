<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route Pages
Route::get('/', [PageController::class, 'landing_page'])->name('landing.page');
Route::get('/logout', [AuthController::class, 'doLogout'])->name('do.logout');
Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot-password.page');

// verification
Route::get('/verify-code', [VerificationController::class, 'verify_code'])->name('verify.code');
Route::get('/verify-email', [VerificationController::class, 'verify_email'])->name('verify.email');

Route::middleware(['guest'])->group(function () {
    // Route for Auth
    Route::get('/register', [AuthController::class, 'register'])->name('register.page');
    Route::post('/register', [AuthController::class, 'doRegister'])->name('do.register');

    Route::get('/login', [AuthController::class, 'login'])->name('login.page');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('do.login');
});

// route for user has been authenticated
Route::middleware('auth', 'role:user')->group(function () {
    Route::get('/dashboard-user', [UserPageController::class, 'dashboard_user'])->name('dashboard.user.page');

    // manage profile user
    Route::get('/profile-user/{user_id}', [UserProfileController::class, 'profile_user'])->name('profile.user.page');
    Route::put('/profile-user/{user_id}', [UserProfileController::class, 'update'])->name('do.update.profile.user');
    Route::put('/profile-user/update-password/{user_id}', [UserProfileController::class, 'update_password'])->name('do.update.password.user');

    // setting user
    Route::get('/setting-user/{user_id}', [UserPageController::class, 'setting_user'])->name('setting.user.page');
    Route::post('/delete-account-user/{user_id}', [UserPageController::class, 'delete_account'])->name('do.delete.account.user');
});

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/dashboard-admin', [AdminPageController::class, 'dashboard_admin'])->name('dashboard.admin.page');

    // manage profile admin
    Route::get('/profile-admin/{admin_id}', [AdminProfileController::class, 'profile_admin'])->name('profile.admin.page');
    Route::put('/profile-admin/{admin_id}', [AdminProfileController::class, 'update'])->name('do.update.profile.admin');
    Route::put('/profile-admin/update-password/{admin_id}', [AdminProfileController::class, 'update_password'])->name('do.update.password.admin');
});
