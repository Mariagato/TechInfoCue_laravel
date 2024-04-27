<?php

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

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AnalyticController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfigsiteController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\VideoController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('home', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('home');
});
Auth::routes();
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['minify']], function () {
    //Detail
    Route::get('contenido/{id}/{title?}', [HomeController::class, 'detail'])->name('Content');
    Route::get('servicio/{id}/{title?}', [HomeController::class, 'detail'])->name('Service');
    Route::get('articulo/{id}/{title?}', [HomeController::class, 'detail'])->name('Article');
    //Forms
    Route::get('contactenos', [HomeController::class, 'contact'])->name('contact');
});

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'cms'], function () {
    //Dashboard
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('graph', [AnalyticController::class, 'graph']);
        Route::get('visits', [AnalyticController::class, 'visits']);
        Route::get('general', [AnalyticController::class, 'general']);
        Route::get('generate-sitemap', [DashboardController::class, 'generateSitemap']);
    });

    //Slide
    Route::group(['prefix' => 'slides'], function () {
        Route::get('edit/{id}', [SlideController::class, 'edit'])->name('slides.edit_slide');
        Route::post('edit/{id}', [SlideController::class, 'update']);
        Route::post('upload-image/{id?}', [SlideController::class, 'uploadImage'])->name('slides.upload');
        Route::post('edit-image/{id?}', [SlideController::class, 'editImage'])->name('slides.edit');
        Route::delete('delete-image/{id?}', [SlideController::class, 'deleteImage'])->name('slides.delete');
        Route::get('get-image/{id?}', [SlideController::class, 'getImage'])->name('slides.get');
        Route::post('order', [SlideController::class, 'orderImages'])->name('slides.order');
    });

    //Gallery
    Route::group(['prefix' => 'galleries'], function () {
        Route::post('upload-image/{id?}', [GalleryController::class, 'uploadImage'])->name('galleries.upload');
        Route::post('edit-image', [GalleryController::class, 'editImage'])->name('galleries.edit');
        Route::delete('delete-image/{id?}', [GalleryController::class, 'deleteImage'])->name('galleries.delete');
        Route::get('get-image/{id?}', [GalleryController::class, 'getImage'])->name('galleries.get');
        Route::post('order', [GalleryController::class, 'orderImages'])->name('galleries.order');
    });

    //Files
    Route::group(['prefix' => 'files'], function () {
        Route::post('upload-file/{id?}', [FileController::class, 'uploadFile'])->name('files.upload');
        Route::post('edit-file', [FileController::class, 'editFile'])->name('files.edit');
        Route::delete('delete-file/{id?}', [FileController::class, 'deleteFile'])->name('files.delete');
        Route::get('get-file/{id?}', [FileController::class, 'getFile'])->name('files.get');
        Route::post('order', [FileController::class, 'orderFiles'])->name('files.order');
    });

    //Video
    Route::group(['prefix' => 'videos'], function () {
        Route::any('upload-video/{id?}', [VideoController::class, 'upload'])->name('videos.upload');
        Route::post('edit-video', [VideoController::class, 'edit'])->name('videos.edit');
        Route::delete('delete-video/{id?}', [VideoController::class, 'delete'])->name('videos.delete');
        Route::get('get-video/{id?}', [VideoController::class, 'get'])->name('videos.get');
        Route::post('order', [VideoController::class, 'order'])->name('videos.order');
    });

    //Category
    Route::group(['prefix' => 'categories'], function () {
        Route::get('get/{id?}', [CategoryController::class, 'get'])->name('categories.get');
        Route::post('edit/{id?}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::get('list/{id?}/{type?}', [CategoryController::class, 'index'])->name('categories.list');
        Route::delete('delete/{id?}', [CategoryController::class, 'delete'])->name('categories.delete');
        Route::post('order', [CategoryController::class, 'order'])->name('categories.order');
        Route::post('upload-image', [CategoryController::class, 'uploadImage'])->name('categories.upload_image');
    });

    //Contents
    Route::group(['prefix' => 'contents'], function () {
        Route::get('list', [ContentController::class, 'index'])->name('contents.list');
        Route::get('json-list', [ContentController::class, 'jsonList']);
        Route::get('edit/{id}', [ContentController::class, 'edit'])->name('contents.edit');
        Route::post('edit/{id}', [ContentController::class, 'updateOrCreate']);
        Route::get('categories', [ContentController::class, 'categories'])->name('contents.categories');
        Route::delete('delete/{id}', [ContentController::class, 'delete']);
    });

    //Articles
    Route::group(['prefix' => 'articles'], function () {
        Route::get('list', [ArticleController::class, 'index'])->name('articles.list');
        Route::get('json-list', [ArticleController::class, 'jsonList']);
        Route::get('edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::post('edit/{id}', [ArticleController::class, 'updateOrCreate']);
        Route::get('categories', [ArticleController::class, 'categories'])->name('articles.categories');
        Route::delete('delete/{id}', [ArticleController::class, 'delete']);
    });

    //Services
    Route::group(['prefix' => 'services'], function () {
        Route::get('list', [ServiceController::class, 'index'])->name('services.list');
        Route::get('json-list', [ServiceController::class, 'jsonList']);
        Route::get('edit/{id}', [ServiceController::class, 'edit'])->name('services.edit');
        Route::post('edit/{id}', [ServiceController::class, 'updateOrCreate']);
        Route::get('categories', [ServiceController::class, 'categories'])->name('services.categories');
        Route::delete('delete/{id}', [ServiceController::class, 'delete']);
        Route::post('order', [ServiceController::class, 'order'])->name('services.order');
        Route::get('get-all', [ServiceController::class, 'get'])->name('services.get_all');
    });

    //Locations
    Route::group(['prefix' => 'locations'], function () {
        Route::get('list', [LocationController::class, 'index'])->name('locations.list');
        Route::get('json-list', [LocationController::class, 'jsonList']);
        Route::get('edit/{id}', [LocationController::class, 'edit'])->name('locations.edit');
        Route::post('edit/{id}', [LocationController::class, 'updateOrCreate']);
        Route::delete('delete/{id}', [LocationController::class, 'delete']);
    });

    //Subscribes
    Route::group(['prefix' => 'subscribers'], function () {
        Route::get('list', [SubscriberController::class, 'index'])->name('subscribers.list');
        Route::get('json-list', [SubscriberController::class, 'jsonList']);
        Route::delete('delete/{id}', [SubscriberController::class, 'delete']);
        Route::get('export', [SubscriberController::class, 'export'])->name('subscribers.export');
    });

    //Configsite
    Route::group(['prefix' => 'configsite'], function () {
        Route::get('edit', [ConfigsiteController::class, 'edit'])->name('configsite.edit');
        Route::post('edit', [ConfigsiteController::class, 'update']);
    });

    //Account
    Route::group(['prefix' => 'account'], function () {
        Route::get('edit', [AccountController::class, 'edit'])->name('account.edit');
        Route::post('edit', [AccountController::class, 'update']);
    });
});
