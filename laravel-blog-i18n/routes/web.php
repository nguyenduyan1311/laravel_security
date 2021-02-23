<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'locale'], function () {

    // Hiển thị danh sách bài viết
    Route::get('/posts', [\App\Http\Controllers\PostController::class,'index'])->name('posts.list');

    // Chuyển đổi ngôn ngữ cho website
    Route::get('change-language/{language}', [\App\Http\Controllers\LanguageController::class,'changeLanguage'])->name('user.change-language');

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::group(["middleware" => "auth"], function () {

        Route::get('/home', function (){
            return view('home');
        })->name('home');

        // Hiển thị giao diện thêm mới bài viết
        Route::get('/posts/create', [\App\Http\Controllers\PostController::class,'create'])->name('posts.create');

        // Tạo mới bài viết
        Route::post('/posts/create', [\App\Http\Controllers\PostController::class,'store'])->name('posts.store');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
