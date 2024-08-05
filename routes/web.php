<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Client\CategoryPageController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomePageController;
use App\Http\Controllers\client\LatestNewsController;
use App\Http\Controllers\Client\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('checkAdmin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::put('/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
        Route::get('/trash', [CategoryController::class, 'trash'])->name('categories.trash');
    });

    Route::prefix('posts')->group(function () {
        Route::put('/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
        Route::get('/trash', [PostController::class, 'trash'])->name('posts.trash');
    });

    Route::prefix('users')->group(function () {
        Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
        Route::put('/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
        Route::get('/trash', [UserController::class, 'trash'])->name('users.trash');
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    });

    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
});

Route::view('not_found', 'not_found')->name("notFound");

Route::get("contact", [ContactController::class,'index'])->name('contact');
Route::get('home-page', [HomePageController::class, 'index'])->name('home.page');
Route::get('category/{id}', [CategoryPageController::class, 'index'])->name('category.page');
Route::post('search', [SearchController::class, 'index'])->name('search');
Route::put('change-active/{id}', [PostController::class, 'changeActive'])->name('changeActive');
Route::put('change-main-post/{id}', [PostController::class, 'changeMainPost'])->name('changeMainPost');
Route::get('latest-news/{id}', [LatestNewsController::class, 'index'])->name('latest.news.page');


Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('password/reset', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [PasswordResetController::class, 'reset'])->name('password.update');



