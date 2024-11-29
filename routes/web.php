<?php

use App\Models\Design;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController, LoginController, DesignController, ProductController,
    CategoryController, RegisterController, AdminProductController,
    AdminCategoryController, AppController, CartController, ChatController, CommentController, DashboardDesignController,
    ReplyController,
    TransactionController
};
use App\Http\Middleware\LocalizationMiddleware;

Route::middleware([LocalizationMiddleware::class])->group(function () {

// ROUTE BUAT HOME DAN ABOUT PAGE

Route::get('/test-env', function () {
    dd(env('PUSHER_APP_KEY'), env('PUSHER_APP_CLUSTER'));
});

Route::get('/', [AppController::class, 'home'])->name('home');
Route::get('/about', [AppController::class, 'about'])->name('about');

// ROUTE BUAT LOCALIZATION

Route::get('/change-language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'id'])) {
        Session::put('locale', $lang);
        App::setLocale($lang);
    }
    return redirect()->back();
})->name('changeLanguage');

// ROUTE BUAT RESOURCE

Route::resources([
    'designs' => DesignController::class,
    'categories' => CategoryController::class,
    'products' => ProductController::class
]);

// ROUTE BUAT TAMBAHAN VIEW DESIGNS

Route::get('/filtered-designs', [DesignController::class, 'filter'])->name('designs.filter');

Route::prefix('designs')->as('designs.')->group(function() {
    Route::get('/product/{product:slug}', [DesignController::class, 'showDesignProduct'])->name('product');
    Route::get('/category/{category:slug}', [DesignController::class, 'showDesignCategory'])->name('category');
    Route::get('/seller/{seller:username}', [DesignController::class, 'showSeller'])->name('seller');
});

Route::get('design/categories/{productSlug}', [DesignController::class, 'getCategoriesByProduct'])->name('designFilter.getCategoriesByProduct');

// ROUTE BUAT GUEST USER

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});
Route::middleware('auth')->post('/logout', [LoginController::class, 'logout'])->name('logout');

// ROUTE BUAT PROFILE PAGE

Route::middleware('auth')->prefix('users')->as('users.')->group(function() {
    Route::resource('/', UserController::class)->parameters(['' => 'user']);
});

// ROUTE BUAT COMMUNICATION

Route::middleware('auth')->prefix('chats')->as('chats.')->group(function () {
    Route::get('/{chatId}/messages', [ChatController::class, 'fetchMessages']);
    
    Route::resource('/', ChatController::class)->parameters(['' => 'chats']);
});

Route::middleware('auth')->group(function () {
    Route::resource('/comments', CommentController::class);
    Route::resource('/replies', ReplyController::class);

    Route::post('/sendFeedback', [DesignController::class, 'sendFeedback'])->name('sendFeedback');
});

// ROUTE FOR CART

Route::middleware('auth')->prefix('carts')->as('carts.')->group(function () {
    // Buat checkout design
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('checkoutFromDesign', [CartController::class, 'checkoutFromDesign'])->name('checkoutFromDesign');

    // buat manage data-data cart
    Route::resource('/', CartController::class)->parameters(['' => 'cart'])->except(['create', 'edit']);
    Route::post('store/{design:slug}', [CartController::class, 'store'])->name('store');
    Route::post('update-is-checked', [CartController::class, 'updateIsChecked'])->name('updateIsChecked');
    Route::post('update-quantity', [CartController::class, 'updateQuantity'])->name('updateQuantity');
});

// ROUTE FOR TRANSACTION

Route::middleware('auth')->prefix('transactions')->as('transactions.')->group(function () {
    Route::get('/orderRequest', [TransactionController::class, 'orderRequest'])->name('orderRequest');
    Route::post('updateStatus/{transaction:order_number}', [TransactionController::class, 'updateStatus'])->name('updateStatus');
    Route::resource('/', TransactionController::class)->parameters(['' => 'transaction']);
});

// ROUTE BUAT ADMIN

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

});