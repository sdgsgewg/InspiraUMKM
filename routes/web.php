<?php

use App\Models\Design;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController, LoginController, DesignController, ProductController,
    CategoryController, RegisterController, AdminProductController,
    AdminCategoryController, AppController, CartController, CommentController, DashboardDesignController,
    ReplyController,
    TransactionController
};

Route::get('/', [AppController::class, 'home'])->name('home');
Route::get('/about', [AppController::class, 'about'])->name('about');

Route::resources([
    'designs' => DesignController::class,
    'categories' => CategoryController::class,
    'products' => ProductController::class
]);

Route::get('/filtered-designs', [DesignController::class, 'filter'])->name('designs.filter');

Route::prefix('designs')->as('designs.')->group(function() {
    Route::get('/product/{product:slug}', [DesignController::class, 'showDesignProduct'])->name('product');
    Route::get('/category/{category:slug}', [DesignController::class, 'showDesignCategory'])->name('category');
    Route::get('/seller/{seller:username}', [DesignController::class, 'showSeller'])->name('seller');
});

Route::get('design/categories/{productSlug}', [DesignController::class, 'getCategoriesByProduct'])->name('designFilter.getCategoriesByProduct');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});
Route::middleware('auth')->post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('users')->as('users.')->group(function() {
    Route::resource('/', UserController::class)->parameters(['' => 'user']);
});

Route::resource('/comments', CommentController::class)->middleware('auth');
Route::resource('/replies', ReplyController::class)->middleware('auth');
Route::post('/sendFeedback', [DesignController::class, 'sendFeedback'])->name('sendFeedback');

Route::middleware('auth')->prefix('carts')->as('carts.')->group(function () {
    // Buat checkout design
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');

    // buat manage data-data cart
    Route::resource('/', CartController::class)->parameters(['' => 'cart'])->except(['create', 'edit']);
    Route::post('store/{design:slug}', [CartController::class, 'store'])->name('store');
    Route::post('update-is-checked', [CartController::class, 'updateIsChecked'])->name('updateIsChecked');
    Route::post('update-quantity', [CartController::class, 'updateQuantity'])->name('updateQuantity');
});

Route::middleware('auth')->prefix('transactions')->as('transactions.')->group(function () {
    Route::get('/orderRequest', [TransactionController::class, 'orderRequest'])->name('orderRequest');
    Route::post('updateStatus/{transaction}', [TransactionController::class, 'updateStatus'])->name('updateStatus');
    Route::resource('/', TransactionController::class)->parameters(['' => 'transaction']);
});

Route::middleware([IsAdmin::class])->prefix('dashboard')->as('admin.')->group(function () {
    Route::get('/', fn() => view('dashboard.index'))->name('dashboard');

    Route::resource('designs', DashboardDesignController::class);
    Route::get('design/checkSlug', [DashboardDesignController::class, 'checkSlug']);
    Route::get('design/categories/{productId}', [DashboardDesignController::class, 'getCategoriesByProduct'])->name('designs.getCategoriesByProduct');

    Route::resource('categories', AdminCategoryController::class)->except('show');
    Route::resource('products', AdminProductController::class)->except('show');

    Route::get('categories/checkSlug', [AdminCategoryController::class, 'checkSlug']);
    Route::get('products/checkSlug', [AdminProductController::class, 'checkSlug']);
});
