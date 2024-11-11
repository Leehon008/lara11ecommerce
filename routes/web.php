<?php

use App\Http\Middleware\AuthAdmin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\QuotationsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionController; 

Auth::routes();
Route::get('/test-email', function () {
    Mail::raw('This is a test email from Laravel.', function ($message) {
        $message->to('no-reply@bestforcreative.co.zw')
                ->subject('Test Email');
    });

    return 'Email sent successfully!';
});
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/designs', [HomeController::class, 'designs'])->name('frontend.pages.designs');

Route::get('/about', function () {
    return view('frontend.pages.about');
});
Route::get('/services', function () {
    return view('frontend.pages.services');
});
Route::get('/contact-us', function () {
    return view('frontend.pages.contact');
}); 

Route::get('/quotation', [QuotationsController::class, 'getQuote'])->name('quotation');
Route::get('/quotation/get-brands/{categoryId}', [QuotationsController::class, 'getBrandsByCategory']);
Route::post('/generate-pdf', [QuotationsController::class, 'generatePDF'])->name('generate.pdf');

//shop routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{product_slug}', [ShopController::class, 'product_details'])->name('shop.product.details');
Route::get('/shop/terms', [ShopController::class, 'terms'])->name('shop.terms');

////cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/order', [CartController::class, 'index'])->name('cart.index1');
Route::get('/cart/make-payment', [CartController::class, 'create_payment'])->name('cart.create.payment');
Route::get('/cart/order_confirmation', [CartController::class, 'showOrderConfirmation'])->name('cart.order.confirmation');// Route to display the order confirmation
Route::get('/cart/order-confirm', [CartController::class, 'showOrderConfirmation'])->name('order.confirm');
Route::post('/cart/add', [CartController::class, 'add_to_cart'])->name('cart.add');
Route::put('/cart/increase-qty/{rowId}', [CartController::class, 'increase_cart_qty'])->name('cart.qty.increase');
Route::put('/cart/decrease-qty/{rowId}', [CartController::class, 'decrease_cart_qty'])->name('cart.qty.decrease');
Route::delete('/cart/remove/{rowId}', [CartController::class, 'remove_item'])->name('cart.item.remove');
Route::post('/cart/process-payment', [CartController::class, 'store_payment'])->name('cart.process_payment');


Route::middleware(['auth'])->group(function () {
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
    Route::get('/account-details', [UserController::class, 'editAccount'])->name('user.account-details');
    Route::post('/account-details/update', [UserController::class, 'updateAccount'])->name('user.updateAccount');
    Route::get('/user/order/{id}/view', [UserController::class, 'view_order'])->name('user.order.view');
});

Route::middleware(['auth', AuthAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    //brand routes
    Route::get('/admin/brands', [AdminController::class, 'brands'])->name('admin.brands');
    Route::get('/admin/brands/add', [AdminController::class, 'add_brand'])->name('admin.brand_add');
    Route::get('/admin/brands/{id}/edit', [AdminController::class, 'edit_brand'])->name('admin.brand_edit');
    Route::post('/admin/brand/store', [AdminController::class, 'store_brand'])->name('admin.brand_store');
    Route::put('/admin/brand/update', [AdminController::class, 'update_brand'])->name('admin.brand_update');
    Route::delete('/admin/brand/{id}/delete', [AdminController::class, 'delete_brand'])->name('admin.brand_delete');
    //categories routes
    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::get('/admin/category/add', [AdminController::class, 'add_category'])->name('admin.category_add');
    Route::get('/admin/category/{id}/edit', [AdminController::class, 'edit_category'])->name('admin.category_edit');
    Route::post('/admin/category/store', [AdminController::class, 'store_category'])->name('admin.category_store');
    Route::put('/admin/category/update', [AdminController::class, 'update_category'])->name('admin.category_update');
    Route::delete('/admin/category/{id}/delete', [AdminController::class, 'delete_category'])->name('admin.category_delete');
    //products routes
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/product/add', [AdminController::class, 'add_product'])->name('admin.product_add');
    Route::get('/admin/product/{id}/edit', [AdminController::class, 'edit_product'])->name('admin.product_edit');
    // Route::get('/admin/product/{id}/view', [AdminController::class, 'view_product'])->name('admin.product_view');
    Route::post('/admin/product/store', [AdminController::class, 'store_product'])->name('admin.product.store');

    Route::put('/admin/product/update', [AdminController::class, 'update_product'])->name('admin.product.update');
    Route::delete('/admin/product/{id}/delete', [AdminController::class, 'delete_product'])->name('admin.product.delete');

    // Quotations Dimensions
    Route::get('/admin/quotations', [AdminController::class, 'quotations'])->name('admin.quotations');

    // Promotions Management Routes
    Route::get('/admin/promotions', [AdminController::class, 'promotions'])->name('admin.promotion'); // View all promotions
    Route::resource('promotion', PromotionController::class)->except(['index']); // Promotion CRUD except index
    Route::delete('/admin/promotions/{promotion}', [PromotionController::class, 'destroy'])->name('admin.promotion_delete'); // Delete promotion
    Route::get('/admin/promotions/{promotion}/edit', [PromotionController::class, 'edit'])->name('admin.promotion_edit'); // Edit promotion
    Route::put('/admin/promotions/{promotion}', [PromotionController::class, 'update'])->name('promotions.update'); // Update promotion
    Route::post('/admin/promotions', [PromotionController::class, 'store'])->name('promotions.store');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
});
