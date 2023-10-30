<?php

use App\Http\Controllers\Backoffice\BackofficeArticleController;
use App\Http\Controllers\Backoffice\BackofficeCategoryController;
use App\Http\Controllers\Backoffice\BackofficeDashboardController;
use App\Http\Controllers\Backoffice\BackofficeProfileController;
use App\Http\Controllers\Backoffice\BackofficeTagController;
use App\Http\Controllers\Blog\BlogArticleController;
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


Route::get('/', [BlogArticleController::class, 'index'])->name('articles.index');

Route::group(['middleware' => 'auth', 'prefix' => 'backoffice', 'as' => 'backoffice.'], function () {
    Route::get('/dashboard', [BackofficeDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [BackofficeProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [BackofficeProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [BackofficeProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('tags', BackofficeTagController::class)->except(['show']);
    Route::resource('categories', BackofficeCategoryController::class)->except(['show']);
    Route::get('/articles/{image}/remove-image', [BackofficeArticleController::class, 'removeImage'])->name('articles.remove.image');
    Route::resource('articles', BackofficeArticleController::class)->except(['show']);
});


require __DIR__ . '/auth.php';
