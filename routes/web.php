<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
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


Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome');
//Route::get('login', [AuthController::class, 'index'])->name('login');
//Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
//Route::get('registration', [AuthController::class, 'registration'])->name('register');
//Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
//Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['auth'])->name('dashboard');
Route::get('/profile', [UserProfileController::class, 'show'])->middleware(['auth'])->name('profile');
Route::post('/profile', [App\Http\Controllers\UserProfileController::class, 'store'])->name('user.profile.store');
require __DIR__.'/auth.php';

Route::get('/edit',  [UserProfileController::class, 'edit'])->middleware(['auth'])->name('edit');
Route::patch('users/{user}/update',  [UserProfileController::class, 'update'])->middleware(['auth'])->name('users.update');


//Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');


//images upload


Route::post('/upload', [ImageController::class, 'upload']);


//Posts

Route::get('add-blog-post-form', [PostController::class, 'index']);
Route::post('store-form', [PostController::class, 'store']);

//Comments


Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
