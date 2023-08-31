<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ManageSiteController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::controller(LoginController::class)->group(function () {
            Route::get('/auth/login', 'index')->name('admin.auth.login');
            Route::post('/auth/login', 'login')->name('admin.auth.make.login');
        });
    });
    Route::middleware(['auth:admin'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category/index', 'index')->name('admin.category.index');
            Route::get('/category/create', 'create')->name('admin.category.create');
            Route::post('/category/store', 'store')->name('admin.category.store');
            Route::get('/category/edit/{id}', 'edit')->name('admin.category.edit');
            Route::post('/category/update/{id}', 'update')->name('admin.category.update');
            Route::get('/category/delete/{id}', 'delete')->name('admin.category.delete');
            Route::get('/category/status/{id}', 'update_status')->name('admin.category.change.status');
        });

        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('/sub-category/index', 'index')->name('admin.sub-category.index');
            Route::get('/sub-category/create', 'create')->name('admin.sub-category.create');
            Route::post('/sub-category/store', 'store')->name('admin.sub-category.store');
            Route::get('/sub-category/edit/{id}', 'edit')->name('admin.sub-category.edit');
            Route::post('/sub-category/update/{id}', 'update')->name('admin.sub-category.update');
            Route::get('/sub-category/delete/{id}', 'delete')->name('admin.sub-category.delete');
            Route::get('/sub-category/status/{id}', 'update_status')->name('admin.sub-category.change.status');
        });

        Route::controller(ChildCategoryController::class)->group(function () {
            Route::get('/child-category/index', 'index')->name('admin.child-category.index');
            Route::get('/child-category/create', 'create')->name('admin.child-category.create');
            Route::post('/child-category/store', 'store')->name('admin.child-category.store');
            Route::get('/child-category/edit/{id}', 'edit')->name('admin.child-category.edit');
            Route::post('/child-category/update/{id}', 'update')->name('admin.child-category.update');
            Route::get('/child-category/delete/{id}', 'delete')->name('admin.child-category.delete');
            Route::post('/child-category/get/sub-category', 'get_sub_category')->name('admin.child-category.get.sub-category');
            Route::post('/child-category/update/sub-category', 'update_sub_category')->name('admin.child-category.update.sub-category');
            Route::get('/child-category/status/{id}', 'update_status')->name('admin.child-category.change.status');
        });

        Route::controller(BrandController::class)->group(function () {
            Route::get('/brand/index', 'index')->name('admin.brand.index');
            Route::get('/brand/create', 'create')->name('admin.brand.create');
            Route::post('/brand/store', 'store')->name('admin.brand.store');
            Route::get('/brand/edit/{id}', 'edit')->name('admin.brand.edit');
            Route::post('/brand/update/{id}', 'update')->name('admin.brand.update');
            Route::get('/brand/delete/{id}', 'delete')->name('admin.brand.delete');
            Route::get('/brand/status/{id}', 'update_status')->name('admin.brand.change.status');
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('/product/index', 'index')->name('admin.product.index');
            Route::get('/product/create', 'create')->name('admin.product.create');
            Route::post('/product/store', 'store')->name('admin.product.store');
            Route::get('/product/edit/{id}', 'edit')->name('admin.product.edit');
            Route::post('/product/update/{id}', 'update')->name('admin.product.update');
            Route::get('/product/delete/{id}', 'delete')->name('admin.product.delete');
            Route::get('/product/change/status/{id}', 'update_status')->name('admin.product.change.status');
            Route::post('/product/sub/category', 'get_sub_category')->name('admin.product.get.sub-category');
            Route::post('/product/child/category', 'get_child_category')->name('admin.product.get.child-category');
        });

        Route::controller(FaqCategoryController::class)->group(function () {
            Route::get('/faq-category/index', 'index')->name('admin.faq-category.index');
            Route::get('/faq-category/create', 'create')->name('admin.faq-category.create');
            Route::post('/faq-category/store', 'store')->name('admin.faq-category.store');
            Route::get('/faq-category/edit/{id}', 'edit')->name('admin.faq-category.edit');
            Route::post('/faq-category/update/{id}', 'update')->name('admin.faq-category.update');
            Route::get('/faq-category/delete/{id}', 'delete')->name('admin.faq-category.delete');
            Route::get('/faq-category/status/{id}', 'update_status')->name('admin.faq-category.change.status');
        });

        Route::controller(FaqController::class)->group(function () {
            Route::get('/faq/index', 'index')->name('admin.faq.index');
            Route::get('/faq/create', 'create')->name('admin.faq.create');
            Route::post('/faq/store', 'store')->name('admin.faq.store');
            Route::get('/faq/edit/{id}', 'edit')->name('admin.faq.edit');
            Route::post('/faq/update/{id}', 'update')->name('admin.faq.update');
            Route::get('/faq/delete/{id}', 'delete')->name('admin.faq.delete');
        });

        Route::controller(BlogCategoryController::class)->group(function () {
            Route::get('/blog-category/index', 'index')->name('admin.blog-category.index');
            Route::get('/blog-category/create', 'create')->name('admin.blog-category.create');
            Route::post('/blog-category/store', 'store')->name('admin.blog-category.store');
            Route::get('/blog-category/edit/{id}', 'edit')->name('admin.blog-category.edit');
            Route::post('/blog-category/update/{id}', 'update')->name('admin.blog-category.update');
            Route::get('/blog-category/delete/{id}', 'delete')->name('admin.blog-category.delete');
            Route::get('/blog-category/status/{id}', 'update_status')->name('admin.blog-category.change.status');
        });

        Route::controller(BlogController::class)->group(function () {
            Route::get('/blog/index', 'index')->name('admin.blog.index');
            Route::get('/blog/create', 'create')->name('admin.blog.create');
            Route::post('/blog/store', 'store')->name('admin.blog.store');
            Route::get('/blog/edit/{id}', 'edit')->name('admin.blog.edit');
            Route::post('/blog/update/{id}', 'update')->name('admin.blog.update');
            Route::get('/blog/delete/{id}', 'delete')->name('admin.blog.delete');
        });

        Route::controller(BlogController::class)->group(function () {
            Route::get('/blog/index', 'index')->name('admin.blog.index');
            Route::get('/blog/create', 'create')->name('admin.blog.create');
            Route::post('/blog/store', 'store')->name('admin.blog.store');
            Route::get('/blog/edit/{id}', 'edit')->name('admin.blog.edit');
            Route::post('/blog/update/{id}', 'update')->name('admin.blog.update');
            Route::get('/blog/delete/{id}', 'delete')->name('admin.blog.delete');
        });

        Route::controller(SliderController::class)->group(function () {
            Route::get('/slider/index', 'index')->name('admin.slider.index');
            Route::get('/slider/create', 'create')->name('admin.slider.create');
            Route::post('/slider/store', 'store')->name('admin.slider.store');
            Route::get('/slider/edit/{id}', 'edit')->name('admin.slider.edit');
            Route::post('/slider/update/{id}', 'update')->name('admin.slider.update');
            Route::get('/slider/delete/{id}', 'delete')->name('admin.slider.delete');
        });

        Route::controller(ServiceController::class)->group(function () {
            Route::get('/service/index', 'index')->name('admin.service.index');
            Route::get('/service/create', 'create')->name('admin.service.create');
            Route::post('/service/store', 'store')->name('admin.service.store');
            Route::get('/service/edit/{id}', 'edit')->name('admin.service.edit');
            Route::post('/service/update/{id}', 'update')->name('admin.service.update');
            Route::get('/service/delete/{id}', 'delete')->name('admin.service.delete');
        });

        Route::controller(ManageSiteController::class)->group(function () {
            Route::get('/manage-site/index', 'index')->name('admin.manage-site.index');
            Route::post('/manage-site/store', 'update_manage_site')->name('admin.manage-site.store');
        });
    });
});
