<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('','/admin/home');

Auth::routes();

Route::post('upload-photo',[\App\Http\Controllers\ImageController::class,'uploadPhoto'])->middleware('auth');

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('categories',\App\Http\Controllers\CategoryController::class);
    Route::resource('posts',\App\Http\Controllers\PostController::class);
    Route::resource('faq',\App\Http\Controllers\FaqController::class);
    Route::get('messages',[\App\Http\Controllers\MessageController::class,'messages']);
    Route::resource('images',\App\Http\Controllers\ImageController::class)->except(['categoryImages']);
    Route::get('categories/{categoryId}/images',[\App\Http\Controllers\ImageController::class,'categoryImages']);
    Route::post('posts/uploadImage',[\App\Http\Controllers\PostController::class,'uploadImage'])->name('posts.uploadImage');
});

    Route::resource('/latest-news',\App\Http\Controllers\LatestNewsController::class);
