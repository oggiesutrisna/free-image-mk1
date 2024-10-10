<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PictureController::class, 'index']);
Route::get('/pictures/{picture_slug}', [\App\Http\Controllers\PictureController::class, 'show'])->name('picture');

//Route::get('/{picture}', [\App\Http\Controllers\PictureController::class, 'show']);
Route::get('/{picture}/comments', [\App\Http\Controllers\CommentController::class, 'index']);
