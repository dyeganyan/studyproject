<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
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
//Route::get('login', [AuthController::class, 'index'])->name('login');
//Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
//Route::get('registration', [AuthController::class, 'registration'])->name('register');
//Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
//Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['auth'])->name('dashboard');
Route::get('/profile', [UserProfileController::class, 'show'])->middleware(['auth'])->name('profile');
Route::post('/profile', [App\Http\Controllers\UserProfileController::class, 'store'])->name('user.profile.store');
require __DIR__.'/auth.php';

Route::get('/edit',  [UserProfileController::class, 'edit'])->middleware(['auth'])->name('edit');
Route::patch('users/{user}/update',  [UserProfileController::class, 'update'])->middleware(['auth'])->name('users.update');


Route::get('/', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']);

Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');


//images upload


Route::post('/upload', [ImageController::class, 'upload']);
