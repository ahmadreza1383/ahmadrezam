<?php

use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Panel\AboutMeController;
use App\Http\Controllers\Panel\ArticleCategoryController;
use App\Http\Controllers\Panel\ArticleController as PanelArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
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

Auth::routes(['register' => false]);
Route::get('/', [IndexController::class , 'index'])->name('index');
Route::resource('articles', ArticleController::class)->only(['index', 'show']);

Route::group(
    [
        'middleware' => ['auth'],
        'prefix' => 'panel',
        'as' => 'panel.'
    ], function(){
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');

        Route::group(
        [
            'prefix'=> 'about-me',
            'controller' => AboutMeController::class,
            'as' => "about-me",
        ], function(){
            Route::get('/', 'edit');
            Route::post('/update', 'update')->name('.update');
        });

        Route::resource('articles', PanelArticleController::class);
        Route::resource('article-categories', ArticleCategoryController::class);
        Route::put('article-categories/update/content/{code}', [PanelArticleController::class, 'updateContent'])
        ->name('articles.update.content');
    }
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
