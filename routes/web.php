<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;


// home
Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/about-us', [HomeController::class, 'about'])->name('about.index')->middleware('AuTh');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact.index')->middleware('AuTh');

//products
Route::get('/total-products', [HomeController::class, 'products_total'])->name('total.products');
Route::get('/single-product/{id}', [HomeController::class, 'single_product'])->name('single.product');
Route::get('/show-single-product/{id}', [HomeController::class, 'show_single_product'])->name('show.single');

// user
Route::get('/login', [UserController::class, 'login'])->name('login.index');
Route::Post('/login', [UserController::class, 'loginDB'])->name('login.DB');
Route::get('/sign-out', [UserController::class, 'sign_out'])->name('sign.out');

Route::get('/cart-account/{name}', [UserController::class, 'user_account'])->name('user.account');
Route::post('/update-address', [UserController::class, 'update_address'])->name('update.address');
Route::get('/cart-user', [UserController::class, 'cart_user'])->name('cart.user');
Route::get('/cart-user/{id}', [UserController::class, 'add_item_to_cart'])->name('add_item.cart');
Route::get('/cart-buy-now/{id}', [UserController::class, 'buy_now'])->name('buy_now.cart');



Route::get('/register', [UserController::class, 'register'])->name('register.index');
Route::Post('/register', [UserController::class, 'registerDB'])->name('register.DB');

Route::get('/dashboard-customers', [UserController::class, 'customers'])->name('customers.index')->middleware('AuTh');
Route::get('/dashboard-single-customer/{id}', [UserController::class, 'single_customer'])->name('single.customer')->middleware('AuTh');



// dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index')->middleware('AuTh');
Route::get('/dashboard-massages', [DashboardController::class, 'massages'])->name('massages.index')->middleware('AuTh');
Route::get('/dashboard-categories', [DashboardController::class, 'categories'])->name('products.index')->middleware('AuTh');

Route::get('/dashboard-show-single-category/{id}', [DashboardController::class, 'show_single_Category'])->name('show_single.category')->middleware('AuTh');
Route::patch('/edit-single-category', [DashboardController::class, 'edit_single_category'])->name('edit_single.category');


Route::post('/dashboard-product', [DashboardController::class, 'add_products'])->name('add.products');
Route::get('/dashboard-delete/{id}/products', [DashboardController::class, 'delete_Products'])->name('delete.products')->middleware('AuTh');

Route::get('/dashboard/products/{productID}', [DashboardController::class, 'view_single_product'])->name('view.single.product')->middleware('AuTh');
Route::Post('/add-single-product', [DashboardController::class, 'add_single_product'])->name('add.product');
Route::get('/delete-single/{id}/product', [DashboardController::class, 'delete_single_product'])->name('delete.product');
Route::get('/view-single/{id}/product', [DashboardController::class, 'view_Product'])->name('view.product')->middleware('AuTh');
Route::patch('/edit-single-product', [DashboardController::class, 'edit_single_product'])->name('edit.single-product');
