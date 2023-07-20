<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/dashboard')->middleware('auth')->group(function(){
    Route::get('home',[DashboardController::class,'index'])->name('dashboard.index');
    Route::resource('contact', ContactController::class);
    Route::get('/contact-fav',[ContactController::class,'indexFav'])->name('indexFav');
    Route::get('/contact-categorized',[ContactController::class,'categorizedIndex'])->name('categorizedIndex');
    Route::get('/contact-categorized-show/{id}',[ContactController::class,'categorizedShow'])->name('categorizedShow');
    Route::resource('category',CategoryController::class)->middleware('can:admin-only');
    Route::get('/user',[PageController::class,'userIndex'])->name('userIndex')->middleware('can:admin-only');
    Route::get('/user-all',[PageController::class,'userIndexAll'])->name('userIndexAll')->middleware('can:admin-only');
    Route::resource('tag',TagController::class)->middleware('can:admin-only');
});
