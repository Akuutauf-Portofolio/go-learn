<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
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
Route::get('/', [PageController::class, 'index'])->name('index.page');

// Route for Auth
Route::get('/register', [AuthController::class, 'register'])->name('register.page');
Route::post('/register', [AuthController::class, 'doRegister'])->name('do.register');

Route::get('/verification-code', [VerificationController::class, 'verification_code_page'])->name('verification.page');

Route::get('/login', [AuthController::class, 'login'])->name('login.page');
Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot-password.page');

Route::get('/logout', [AuthController::class, 'doLogout'])->name('do.logout');

// route for user has been authenticated
Route::middleware('auth', 'role:user')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard.page');
});
