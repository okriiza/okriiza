<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExpertiseController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Tags\Url;
use Spatie\Sitemap\SitemapGenerator;
use Symfony\Component\Console\Input\Input;

Route::domain('okriiza.test')->middleware('optimizeImages')->group(function(){
        Route::get('/', [HomeController::class, 'index'])
        ->name('home');
        Route::view('/disclaimer', 'pages.disclaimer')->name('disclaimer');
        Route::view('/privacy-policy', 'pages.privacy-policy')->name('privacy-policy');
        Route::prefix('dashboard')
        ->middleware(['auth','admin','optimizeImages','verified'])
        ->group(function() {
            Route::get('/', [DashboardController::class,'index'])
                ->name('dashboard');
                
            Route::post('article/images', [ArticleController::class,'articleimage'])
            ->name('post.articleimage');
            Route::resource('article', ArticleController::class);
            Route::resource('project', ProjectController::class);
            Route::resource('category', CategoryController::class);
            Route::resource('expertise', ExpertiseController::class);
        });
    });

    Route::domain('blog.okriiza.test')->middleware('optimizeImages')->group(function () {
        Route::get('/', [PostController::class, 'index'])
        ->name('article');
        Route::get('/{slug}',[PostController::class, 'detail_post'])
            ->name('detail');
        Route::get('/category/{category}', [PostController::class, 'category_post'])
            ->name('category');

        Route::prefix('page')->group(function(){
            Route::view('/disclaimer', 'pages.page.disclaimer')->name('disclaimer');
            Route::view('/privacy-policy', 'pages.page.privacy-policy')->name('privacy-policy');
            Route::view('/terms-and-conditions', 'pages.page.terms-and-conditions')->name('terms-and-conditions');
            Route::view('/about', 'pages.page.about')->name('about');
            Route::get('/search', [PostController::class, 'search'])
            ->name('search');
        });
    });
    

Auth::routes(['verify' => true]);