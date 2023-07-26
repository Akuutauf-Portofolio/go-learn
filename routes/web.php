<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SpecialPermissionController;
use App\Http\Controllers\UserController;
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

// error page
Route::get('/error-page', [PageController::class, 'error_page'])->name('error.page');
Route::get('/unauthorized-page', [PageController::class, 'unauthorized_page'])->name('unauthorized.page');

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
});

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/dashboard-admin', [AdminPageController::class, 'dashboard_admin'])->name('dashboard.admin.page');
});

// manage profile user
Route::middleware('auth', 'role:user', 'permission:edit profile')->group(function () {
    Route::get('/profile-user/{user_id}', [UserProfileController::class, 'profile_user'])->name('profile.user.page');
    Route::put('/profile-user/{user_id}', [UserProfileController::class, 'update'])->name('do.update.profile.user');
    Route::put('/profile-user/update-password/{user_id}', [UserProfileController::class, 'update_password'])->name('do.update.password.user');
});

// setting user
Route::middleware('auth', 'permission:delete account')->group(function () {
    Route::get('/setting-user/{user_id}', [UserPageController::class, 'setting_user'])->name('setting.user.page');
    Route::post('/delete-account-user/{user_id}', [UserPageController::class, 'delete_account'])->name('do.delete.account.user');
});

// manage profile admin
Route::middleware('auth', 'role:admin', 'permission:edit profile')->group(function () {
    Route::get('/profile-admin/{admin_id}', [AdminProfileController::class, 'profile_admin'])->name('profile.admin.page');
    Route::put('/profile-admin/{admin_id}', [AdminProfileController::class, 'update'])->name('do.update.profile.admin');
    Route::put('/profile-admin/update-password/{admin_id}', [AdminProfileController::class, 'update_password'])->name('do.update.password.admin');
});

// management user
Route::middleware('auth', 'permission:manage user')->group(function () {
    Route::get('/manajemen-user', [UserController::class, 'index'])->name('manage.user.page');
    Route::post('/manajemen-user/store', [UserController::class, 'store'])->name('manage.user.store');
    Route::get('/manajemen-user/delete/{user_id}', [UserController::class, 'destroy'])->name('manage.user.destroy');
    Route::get('/manajemen-user/ubah/{user_id}', [UserController::class, 'edit'])->name('manage.user.edit');
    Route::put('/manajemen-user/ubah/{user_id}', [UserController::class, 'update'])->name('manage.user.update');
    Route::put('/manajemen-user/update-password-user/{user_id}', [UserController::class, 'update_password'])->name('manage.update.password.user');
});

Route::middleware('auth', 'permission:manage special permission')->group(function () {
    Route::get('/manajemen-special-permission-user', [SpecialPermissionController::class, 'index'])->name('manage.special.permission.page');
    Route::get('/manajemen-special-permission-user/ubah-permission/{user_id}', [SpecialPermissionController::class, 'edit'])->name('manage.special.permission.edit');
    Route::put('/manajemen-special-permission-user/ubah-permission/{user_id}', [SpecialPermissionController::class, 'update'])->name('manage.special.permission.update');
});

// management role
Route::middleware(['auth', 'permission:manage role'])->group(function () {
    Route::get('/manajemen-role', [RoleController::class, 'index'])->name('manage.role.page');
    Route::post('/manajemen-role/store', [RoleController::class, 'store'])->name('manage.role.store');
    Route::get('/manajemen-role/delete/{role_id}', [RoleController::class, 'destroy'])->name('manage.role.destroy');
    Route::get('/manajemen-role/ubah/{role_id}', [RoleController::class, 'edit'])->name('manage.role.edit');
    Route::put('/manajemen-role/ubah/{role_id}', [RoleController::class, 'update'])->name('manage.role.update');
});

// management permission
Route::middleware(['auth', 'permission:manage permit'])->group(function () {
    Route::get('/manajemen-permission', [PermissionController::class, 'index'])->name('manage.permission.page');
    Route::post('/manajemen-permission/store', [PermissionController::class, 'store'])->name('manage.permission.store');
    Route::get('/manajemen-permission/delete/{permission_id}', [PermissionController::class, 'destroy'])->name('manage.permission.destroy');
    Route::get('/manajemen-permission/ubah/{permission_id}', [PermissionController::class, 'edit'])->name('manage.permission.edit');
    Route::put('/manajemen-permission/ubah/{permission_id}', [PermissionController::class, 'update'])->name('manage.permission.update');
});
