<?php

use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\EnrollmentController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ApprovalController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['verify' => true]);

Route::get('email/approval', [ApprovalController::class, 'show'])->name('approval.notice');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified', 'approved']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Subscription
    Route::resource('subscriptions', SubscriptionController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit', 'show']]);

    // Testimonial
    Route::resource('testimonials', TestimonialController::class, ['except' => ['store', 'update', 'destroy']]);

    // Article
    Route::post('articles/media', [ArticleController::class, 'storeMedia'])->name('articles.storeMedia');
    Route::resource('articles', ArticleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Article Category
    Route::resource('article-categories', ArticleCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Contact Us
    Route::resource('contact-uss', ContactUsController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // Enrollment
    Route::resource('enrollments', EnrollmentController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
