<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return json_encode(['type' => 'articles']);
});

Route::apiResource('articles', \App\Http\Controllers\ArticleController::class);
