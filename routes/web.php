<?php

use App\Models\Design;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController, LoginController, DesignController, ProductController,
    CategoryController, RegisterController, AdminProductController,
    AdminCategoryController, AppController, CartController, DashboardDesignController
};

Route::get('/', [AppController::class, 'home'])->name('home');
Route::view('/about', 'about', ['title' => 'InspiraUMKM']);

Route::resources([
    'designs' => DesignController::class,
    'categories' => CategoryController::class,
    'products' => ProductController::class,
    'users' => UserController::class
]);

Route::get('design/categories/{productSlug}', [DesignController::class, 'getCategoriesByProduct'])->name('designFilter.getCategoriesByProduct');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
});
Route::middleware('auth')->post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('carts/checkout', [CartController::class, 'checkout'])->name('carts.checkout');
    Route::resource('carts', CartController::class);
    Route::post('carts/store/{design:slug}', [CartController::class, 'store'])->name('carts.store');
});

Route::middleware([IsAdmin::class])->prefix('dashboard')->as('admin.')->group(function () {
    Route::get('/', fn() => view('dashboard.index'))->name('dashboard');

    Route::resource('designs', DashboardDesignController::class);
    Route::resource('categories', AdminCategoryController::class)->except('show');
    Route::resource('products', AdminProductController::class)->except('show');

    Route::get('design/checkSlug', [DashboardDesignController::class, 'checkSlug']);
    Route::get('categories/checkSlug', [AdminCategoryController::class, 'checkSlug']);
    Route::get('products/checkSlug', [AdminProductController::class, 'checkSlug']);

    Route::get('design/categories/{productId}', [DashboardDesignController::class, 'getCategoriesByProduct'])->name('designs.getCategoriesByProduct');
});
