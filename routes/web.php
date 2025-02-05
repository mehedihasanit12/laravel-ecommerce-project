<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/product-category/{id}', [WebsiteController::class, 'category'])->name('product-category');
Route::get('/product-detail/{id}', [WebsiteController::class, 'product'])->name('product-detail');

Route::get('/cart/index', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/direct-add/{id}', [CartController::class, 'directAddToCart'])->name('cart.direct-add');
Route::get('/cart/remove/{id}', [CartController::class, 'deleteProduct'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'updateProduct'])->name('cart.update');

Route::get('/checkout/index', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/new-customer', [CheckoutController::class, 'newCustomer'])->name('checkout.new-customer');
Route::post('/checkout/customer-login', [CheckoutController::class, 'customerLogin'])->name('checkout.customer-login');
Route::get('/checkout/billing-info', [CheckoutController::class, 'billingInfo'])->name('checkout.billing-info');
Route::post('/checkout/new-order', [CheckoutController::class, 'newOrder'])->name('checkout.new-order');
Route::get('/checkout/complete-order', [CheckoutController::class, 'completeOrder'])->name('checkout.complete-order');

Route::get('/customer/login-register', [CustomerAuthController::class, 'index'])->name('login-register');
Route::get('/customer/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/sub-category/index', [SubCategoryController::class, 'index'])->name('sub-category.index');
    Route::get('/sub-category/create', [SubCategoryController::class, 'create'])->name('sub-category.create');
    Route::post('/sub-category/store', [SubCategoryController::class, 'store'])->name('sub-category.store');
    Route::get('/sub-category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub-category.edit');
    Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('sub-category.update');
    Route::get('/sub-category/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub-category.delete');

    Route::get('/brand/index', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

    Route::get('/unit/index', [UnitController::class, 'index'])->name('unit.index');
    Route::get('/unit/create', [UnitController::class, 'create'])->name('unit.create');
    Route::post('/unit/store', [UnitController::class, 'store'])->name('unit.store');
    Route::get('/unit/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::get('/unit/delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');

    Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/get-sub-category-by-category', [ProductController::class, 'getSubCategoryByCategory'])->name('get-sub-category-by-category');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('/admin/all-order', [AdminOrderController::class, 'index'])->name('admin.all-order');
    Route::get('/admin/order-detail/{id}', [AdminOrderController::class, 'detail'])->name('admin.order-detail');
    Route::get('/admin/order-edit/{id}', [AdminOrderController::class, 'edit'])->name('admin.order-edit');
    Route::post('/admin/order-update/{id}', [AdminOrderController::class, 'update'])->name('admin.order-update');
    Route::get('/admin/order-invoice/{id}', [AdminOrderController::class, 'invoice'])->name('admin.order-invoice');
    Route::get('/admin/order-invoice-print/{id}', [AdminOrderController::class, 'invoicePrint'])->name('admin.order-invoice-print');
    Route::get('/admin/order-delete/{id}', [AdminOrderController::class, 'delete'])->name('admin.order-delete');
});
