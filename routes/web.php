<?php

use App\Http\Middleware\AuthAdmin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware(['auth'])->group( function () {
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
});

Route::middleware(['auth',AuthAdmin::class])->group( function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    //brand routes
    Route::get('/admin/brands', [AdminController::class, 'brands'])->name('admin.brands');
    Route::get('/admin/brands/add', [AdminController::class, 'add_brand'])->name('admin.brand_add');
    Route::get('/admin/brands/edit/{id}', [AdminController::class, 'edit_brand'])->name('admin.brand_edit');
    Route::post('/admin/brand/store', [AdminController::class, 'store_brand'])->name('admin.brand_store');
    Route::put('/admin/brand/update', [AdminController::class, 'update_brand'])->name('admin.brand_update');
    Route::delete('/admin/brand/{id}/delete', [AdminController::class, 'delete_brand'])->name('admin.brand_delete');
    //categories routes
    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::get('/admin/category/add', [AdminController::class, 'add_category'])->name('admin.category_add');
    Route::get('/admin/category/edit/{id}', [AdminController::class, 'edit_category'])->name('admin.category_edit');
    Route::post('/admin/category/store', [AdminController::class, 'store_category'])->name('admin.category_store');
    Route::put('/admin/category/update', [AdminController::class, 'update_category'])->name('admin.category_update');
    Route::delete('/admin/category/{id}/delete', [AdminController::class, 'delete_category'])->name('admin.category_delete');
    //products routes
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/product/add', [AdminController::class, 'add_product'])->name('admin.product_add');
    Route::get('/admin/product/edit/{id}', [AdminController::class, 'edit_product'])->name('admin.product_edit');
    // Route::get('/admin/product/view/{id}', [AdminController::class, 'view_product'])->name('admin.product_view');
    Route::post('/admin/product/store', [AdminController::class, 'store_product'])->name('admin.product.store');
    Route::put('/admin/product/update', [AdminController::class, 'update_product'])->name('admin.product_update');
    Route::delete('/admin/product/{id}/delete', [AdminController::class, 'delete_product'])->name('admin.product_delete');
});
