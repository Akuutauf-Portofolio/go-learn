<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
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
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard.page');

// Route for Auth
Route::get('/register', [AuthController::class, 'register'])->name('register.page');
Route::get('/login', [AuthController::class, 'login'])->name('login.page');
Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot-password.page');
