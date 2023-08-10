<?php

use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Panel\AboutMeController;
use App\Http\Controllers\Panel\ArticleCategoryController;
use App\Http\Controllers\Panel\ArticleController;
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
Route::get('/', [IndexController::class , 'index']);

Route::group(
    [
        'middleware' => ['auth:admin'],
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

        Route::group(
        [
            'prefix' => 'article',
            'controller' => ArticleController::class,
            'as' => 'article',
        ], function()
        {
            Route::get('/', 'index');
            Route::post('/create', 'create')->name('.create');
            Route::get('/edit/{code}', 'edit')->name('.edit');
            Route::delete('/destroy/{code}', 'destroy')->name('.destroy');
            Route::put('/update/{code}', 'update')->name('.update');
            Route::put('/update/{code}/content', 'updateContent')->name('.update.content');
            Route::put('/status/{code}', 'status')->name('.status');

            Route::group(
            [
                'prefix' => 'category',
                'controller' => ArticleCategoryController::class,
                'as' => '.category',
            ], function()
            {
                Route::get('/', 'index');
                Route::post('/create', 'create')->name('.create');
                Route::get('/edit/{code}', 'edit')->name('.edit');
                Route::delete('/destroy/{code}', 'destroy')->name('.destroy');
                Route::put('/update/{code}', 'update')->name('.update');
                Route::put('/status/{code}', 'status')->name('.status');
            });
        });
    }
);
