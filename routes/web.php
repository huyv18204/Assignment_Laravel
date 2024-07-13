<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Client\CategoryPageController;
use App\Http\Controllers\client\ContentPageController;
use App\Http\Controllers\Client\HomepageController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);
Route::get('home-page', [HomepageController::class, 'index'])->name('homePage');
Route::get('category-page/{id}', [CategoryPageController::class, 'index'])->name('categoryPage');
Route::post('search', [HomepageController::class, 'search'])->name('search');
Route::put('change-active/{id}', [PostController::class, 'changeActive'])->name('changeActive');
Route::put('change-main-post/{id}', [PostController::class, 'changeMainPost'])->name('changeMainPost');
Route::get('content-page/{id}', [ContentPageController::class, 'contentPage'])->name('contentPage');

Route::get('show-form-register', [AuthController::class, 'showFormRegister'])->name('signup-form');
Route::get('show-form-login', [AuthController::class, 'showFormLogin'])->name('login-form');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::view('/dashboard', 'dashboard')->name('dashboard');
