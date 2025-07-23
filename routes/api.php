<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::Group(['prefix' => 'api'], function () {
    Route::get('index', function () {
        return response()->json(['message' => 'Welcome to the API']);
    });

    Route::get('add', [AdminController::class, 'add']);

    Route::get('update', [AdminController::class, 'update']);
});
