<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
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

Route::get('/',[\App\Http\Controllers\SiteController::class,'index'])->name('site.index');
Route::get('/who-we-are',[\App\Http\Controllers\SiteController::class,'about'])->name('site.about');
Route::get('/gallery',[\App\Http\Controllers\SiteController::class,'gallery'])->name('site.gallery');
Route::get('/faqs',[\App\Http\Controllers\SiteController::class,'faqs'])->name('site.faqs');
Route::get('/contact',[\App\Http\Controllers\SiteController::class,'contact'])->name('site.contact');
Route::post('/contact',[\App\Http\Controllers\SiteController::class,'sendContact'])->name('site.sendContact');
Route::get('/registrations',[\App\Http\Controllers\SiteController::class,'registrations'])->name('site.registrations');

Auth::routes(['register' => false]);

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


    Route::get('change-language/{lang}', function ($lang) {
        if (in_array($lang, ['ar', 'fr'])) {
            Session::put('locale', $lang);
            App::setLocale($lang);
        }
        return redirect()->back();
    })->name('change.lang');
