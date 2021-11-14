<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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

Route::get('/',             [HomeController::class,  'index'])->name('home');
Route::get('/ojs',          [HomeController::class,  'ojs'])->name('ojs');

Route::get('/login',        [LoginController::class, 'login'])->name('sign-in');
Route::get('/register',     [LoginController::class, 'register'])->name('sign-up');
Route::get('/account',      [LoginController::class, 'account'])->name('account');

Route::post('/login',       [LoginController::class, 'loginRequest'])->name('login-post');
Route::post('/register',    [LoginController::class, 'registerRequest'])->name('register-post');

Route::get('/profile/me',   [UserController::class, 'me'])->name('user-profile');
Route::get('/profile/qr',   [UserController::class, 'renderQrCode'])->name('user-qr-code');

Route::post('/profile/to-pdf', [UserController::class, 'convertWordToPdf'])->name('user-generate-pdf');
Route::post('/profile/file-upload', [UserController::class, 'uploadToStorage'])->name('user-upload-storage');


