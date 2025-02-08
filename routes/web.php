<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//###############################################

use App\Http\Controllers\Admin\PostController;

// گروه مسیرهای ادمین (نیاز به احراز هویت دارد)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('posts', PostController::class);
});

//###############################################

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//###############################################
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{post:slug}', [HomeController::class, 'show'])->name('post.show');

//#####################################################

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CommentController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class)->only(['index', 'destroy']);
    Route::resource('comments', CommentController::class)->only(['index', 'destroy']);
});
