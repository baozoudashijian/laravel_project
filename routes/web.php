<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::Group(['prefix' => 'user'], function () {
    Route::get('add', [AdminController::class, 'add']);

    Route::get('update', [AdminController::class, 'update']);
});
