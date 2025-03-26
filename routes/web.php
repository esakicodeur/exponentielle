<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\MatieresController;
use App\Http\Controllers\Admin\PostImageController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

// Authentification
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// Compte utilisateur
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::patch('/home', [HomeController::class, 'updatePassword']);

// Front Office
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/categories/{category}', [PostController::class, 'postsByCategory'])->name('posts.byCategory');
Route::get('/tags/{tag}', [PostController::class, 'postsByTag'])->name('posts.byTag');
Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/{post}/comment', [PostController::class, 'comment'])->middleware('auth')->name('posts.comment');

// Administration
Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Posts
    Route::resource('/posts', PostsController::class)->except('show')->names('posts');
    Route::get('/posts/{postId}/upload', [PostImageController::class, 'index'])->name('images.upload');
    Route::post('/posts/{postId}/upload',[PostImageController::class, 'store'])->name('images.store');
    Route::get('/post-image/{postImageId}/delete',[PostImageController::class, 'destroy'])->name('images.destroy');

    // Categories
    Route::resource('/categories', CategoriesController::class)->except('show')->names('categories');

    // Matieres
    Route::resource('/matieres', MatieresController::class)->except('show')->names('matieres');

    // Tags
    Route::resource('/tags', TagsController::class)->except('show')->names('tags');

    // Users
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');;
});
