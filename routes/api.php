<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/categories',[\App\Http\Controllers\CategoryController::class,'categories']);
Route::get('/posts/{slug}',[\App\Http\Controllers\PostController::class,'post']);
Route::get('/latest-posts',[\App\Http\Controllers\PostController::class,'latestPosts']);
Route::get('/categories/{category}/images',[\App\Http\Controllers\CategoryController::class,'showImages']);
Route::get('/faq',[\App\Http\Controllers\FaqController::class,'questionsAnswers']);
Route::post('/send-message',[\App\Http\Controllers\MessageController::class,'send']);
