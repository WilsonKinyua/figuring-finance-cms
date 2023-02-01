<?php

use App\Http\Controllers\Api\V1\Admin\ArticleApiController;
use App\Http\Controllers\Api\V1\Admin\ArticleCategoryApiController;
use App\Http\Controllers\Api\V1\Admin\ContactUsApiController;
use App\Http\Controllers\Api\V1\Admin\SubscriptionApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Subscription
    Route::apiResource('subscriptions', SubscriptionApiController::class, ['only' => ['index', 'destroy']]);

    // Article
    Route::post('articles/media', [ArticleApiController::class, 'storeMedia'])->name('articles.store_media');
    Route::apiResource('articles', ArticleApiController::class);

    // Article Category
    Route::apiResource('article-categories', ArticleCategoryApiController::class);

    // Contact Us
    Route::apiResource('contactuses', ContactUsApiController::class, ['only' => ['index', 'show', 'destroy']]);
});
