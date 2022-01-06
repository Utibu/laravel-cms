<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
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

Route::domain('{domain}.localhost')->middleware(['App\Http\Middleware\CheckSiteValidity'])->group(function () {
  Route::get('/', [SiteController::class, 'publicHome']);
  Auth::routes();


  Route::get('/{slug}', [PostController::class, 'showPost']);

  Route::prefix('admin')->middleware(['auth'])->group(function() {
    Route::get('/', [AdminDashboard::class, 'index']);
    Route::resource('/post', PostController::class);
  });
});

Route::domain('localhost')->group(function () {
  Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

  Route::prefix('admin')->middleware(['auth'])->group(function() {
    Route::get('/', [AdminDashboard::class, 'index']);
    Route::resource('/site', SiteController::class);
  });
});



Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


