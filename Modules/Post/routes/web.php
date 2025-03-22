<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\PostController;

Route::prefix('admin')->group(function () {
    Route::resource('post', PostController::class)->names('post');
});
