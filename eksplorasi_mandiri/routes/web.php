<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ImageController;

Route::get('/image-upload', [ImageController::class, 'index']);
Route::post('/image-upload', [ImageController::class, 'store'])->name('image.store');
