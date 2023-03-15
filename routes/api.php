<?php

use App\Http\Controllers\Api\V1\Admin\ArticleApiController;
use App\Http\Controllers\Api\V1\Admin\ArticleCategoryApiController;
use App\Http\Controllers\Api\V1\Admin\ContactUsApiController;
use App\Http\Controllers\Api\V1\Admin\EnrollmentApiController;
use App\Http\Controllers\Api\V1\Admin\SubscriptionApiController;

Route::apiResource('subscriptions', SubscriptionApiController::class, ['only' => ['store']]);

// Enrollment
Route::apiResource('enrollments', EnrollmentApiController::class, ['only' => ['store']]);
// Route::group(['prefix' => 'v1', 'as' => 'api.'], function () {
//     // Subscription
//     Route::apiResource('subscriptions', SubscriptionApiController::class, ['only' => ['store']]);

//     // Article
//     Route::post('articles/media', [ArticleApiController::class, 'storeMedia'])->name('articles.store_media');
//     Route::apiResource('articles', ArticleApiController::class);

//     // Article Category
//     Route::apiResource('article-categories', ArticleCategoryApiController::class);

//     // Contact Us
//     Route::apiResource('contactuses', ContactUsApiController::class, ['only' => ['index', 'show', 'destroy']]);
// });
