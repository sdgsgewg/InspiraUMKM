<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardDesignController;
use App\Http\Controllers\ProductController;
use App\Models\Design;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home Page',
        'designs' => Design::all()
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About Us'
    ]);
});

Route::get('/profile', [UserController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/designs', [DesignController::class, 'index']);
Route::get('/designs/{design:slug}', [DesignController::class, 'show']);

Route::get('/posts', [PostController::class, 'index']);
// halaman single post
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/cart', function(){
    return view('cart', [
        'title' => 'My Cart'
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/designs/checkSlug', [DashboardDesignController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/designs', DashboardDesignController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware(IsAdmin::class);
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');