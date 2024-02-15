<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TheLoaiController;
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

Route::get('/', function () {
    return view('layout');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/',[IndexController::class,'home']);
Route::get('/truyen-tranh/{idtruyen}',[IndexController::class,'truyentranh'])->name('truyen-tranh');
Route::get('/danh-muc/{slug}',[IndexController::class,'danhmuc'])->name('danh-muc');
Route::get('/the-loai/{slug}',[IndexController::class,'theloai'])->name('the-loai');
Route::get('/chap/{slug}',[IndexController::class,'chapter'])->name('chap');
Route::get('/tag/{tag}',[IndexController::class,'tag'])->name('tag');
Route::post('/search',[IndexController::class,'timkiem'])->name('search');
Route::post('/search-ajax',[IndexController::class,'search_ajax'])->name('search-ajax');
Route::resource('danhmuc',CategoryController::class);
Route::resource('truyen',TruyenController::class);
Route::resource('chapter',ChapterController::class);
Route::resource('theloai',TheLoaiController::class);

//API
Route::resource('/posts',\App\Http\Controllers\API\PostController::class);
