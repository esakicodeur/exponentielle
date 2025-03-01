<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostImageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::patch('/home', [HomeController::class, 'updatePassword']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin')->name('admin.dashboard');
Route::resource('/admin/posts', PostsController::class)->except('show')->middleware('admin')->names('admin.posts');
Route::get('admin/posts/{postId}/upload', [PostImageController::class, 'index'])->middleware('admin')->name('admin.images.upload');
Route::post('admin/posts/{postId}/upload',[PostImageController::class, 'store'])->middleware('admin')->name('admin.images.store');
Route::get('post-image/{postImageId}/delete',[PostImageController::class, 'destroy'])->middleware('admin')->name('admin.images.destroy');

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/categories/{category}', [PostController::class, 'postsByCategory'])->name('posts.byCategory');
Route::get('/tags/{tag}', [PostController::class, 'postsByTag'])->name('posts.byTag');
Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/{post}/comment', [PostController::class, 'comment'])->middleware('auth')->name('posts.comment');
