<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\CategoryController;

Route::prefix('admin')->group(function () {
    Route::resource('category', CategoryController::class)->names('category');
});
