<?php
use App\Http\Controllers\TestController;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', function () {
    return redirect()->route('home');
});

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['minify']], function () {
    //Detail
    Route::get('contenido/{id}/{title?}', 'HomeController@detail')->name('Content');
    Route::get('servicio/{id}/{title?}', 'HomeController@detail')->name('Service');
    Route::get('articulo/{id}/{title?}', 'HomeController@detail')->name('Article');
    //Forms
    Route::get('contactenos', 'HomeController@contact')->name('contact');
});

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::group(['prefix' => 'cms'], function () {
    //Dashboard
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('graph', 'AnalyticController@graph');
        Route::get('visits', 'AnalyticController@visits');
        Route::get('general', 'AnalyticController@general');
    });

    //Slide
    Route::group(['prefix' => 'slides'], function () {
        Route::get('edit/{id}', 'SlideController@edit')->name('slides.edit_slide');
        Route::post('edit/{id}', 'SlideController@update');
        Route::post('upload-image/{id?}', 'SlideController@uploadImage')->name('slides.upload');
        Route::post('edit-image/{id?}', 'SlideController@editImage')->name('slides.edit');
        Route::delete('delete-image/{id?}', 'SlideController@deleteImage')->name('slides.delete');
        Route::get('get-image/{id?}', 'SlideController@getImage')->name('slides.get');
        Route::post('order', 'SlideController@orderImages')->name('slides.order');
    });

    //Gallery
    Route::group(['prefix' => 'galleries'], function () {
        Route::post('upload-image/{id?}', 'GalleryController@uploadImage')->name('galleries.upload');
        Route::post('edit-image', 'GalleryController@editImage')->name('galleries.edit');
        Route::delete('delete-image/{id?}', 'GalleryController@deleteImage')->name('galleries.delete');
        Route::get('get-image/{id?}', 'GalleryController@getImage')->name('galleries.get');
        Route::post('order', 'GalleryController@orderImages')->name('galleries.order');
    });


    //User
    Route::group(['prefix' => 'users'], function () {
        Route::get('get-list', 'UserController@users')->name('users');
        Route::get('edit-user/{id}', 'UserController@editUser')->name('users.edit');
        Route::post('edit-user/{id}', 'UserController@updateOrCreateUser');
        Route::get('json-list', 'UserController@jsonListUsers');
    });


    //Files
    Route::group(['prefix' => 'files'], function () {
        Route::post('upload-file/{id?}', 'FileController@uploadFile')->name('files.upload');
        Route::post('edit-file', 'FileController@editFile')->name('files.edit');
        Route::delete('delete-file/{id?}', 'FileController@deleteFile')->name('files.delete');
        Route::get('get-file/{id?}', 'FileController@getFile')->name('files.get');
        Route::post('order', 'FileController@orderFiles')->name('files.order');
    });

    //Video
    Route::group(['prefix' => 'videos'], function () {
        Route::any('upload-video/{id?}', 'VideoController@upload')->name('videos.upload');
        Route::post('edit-video', 'VideoController@edit')->name('videos.edit');
        Route::delete('delete-video/{id?}', 'VideoController@delete')->name('videos.delete');
        Route::get('get-video/{id?}', 'VideoController@get')->name('videos.get');
        Route::post('order', 'VideoController@order')->name('videos.order');
    });

    //Category
    Route::group(['prefix' => 'categories'], function () {
        Route::get('get/{id?}', 'CategoryController@get')->name('categories.get');
        Route::post('edit/{id?}', 'CategoryController@edit')->name('categories.edit');
        Route::get('list/{id?}/{type?}', 'CategoryController@index')->name('categories.list');
        Route::delete('delete/{id?}', 'CategoryController@delete')->name('categories.delete');
        Route::post('order', 'CategoryController@order')->name('categories.order');
        Route::post('upload-image', 'CategoryController@uploadImage')->name('categories.upload_image');
    });

    //Contents
    Route::group(['prefix' => 'contents'], function () {
        Route::get('list', 'ContentController@index')->name('contents.list');
        Route::get('json-list', 'ContentController@jsonList');
        Route::get('edit/{id}', 'ContentController@edit')->name('contents.edit');
        Route::post('edit/{id}', 'ContentController@updateOrCreate');
        Route::get('categories', 'ContentController@categories')->name('contents.categories');
        Route::delete('delete/{id}', 'ContentController@delete');
    });

    //Articles
    Route::group(['prefix' => 'articles'], function () {
        Route::get('list', 'ArticleController@index')->name('articles.list');
        Route::get('json-list', 'ArticleController@jsonList');
        Route::get('edit/{id}', 'ArticleController@edit')->name('articles.edit');
        Route::post('edit/{id}', 'ArticleController@updateOrCreate');
        Route::get('categories', 'ArticleController@categories')->name('articles.categories');
        Route::delete('delete/{id}', 'ArticleController@delete');
    });

    //Services
    Route::group(['prefix' => 'services'], function () {
        Route::get('list', 'ServiceController@index')->name('services.list');
        Route::get('json-list', 'ServiceController@jsonList');
        Route::get('edit/{id}', 'ServiceController@edit')->name('services.edit');
        Route::post('edit/{id}', 'ServiceController@updateOrCreate');
        Route::get('categories', 'ServiceController@categories')->name('services.categories');
        Route::delete('delete/{id}', 'ServiceController@delete');
        Route::post('order', 'ServiceController@order')->name('services.order');
        Route::get('get-all', 'ServiceController@get')->name('services.get_all');
    });

    //Locations
    Route::group(['prefix' => 'locations'], function () {
        Route::get('list', 'LocationController@index')->name('locations.list');
        Route::get('json-list', 'LocationController@jsonList');
        Route::get('edit/{id}', 'LocationController@edit')->name('locations.edit');
        Route::post('edit/{id}', 'LocationController@updateOrCreate');
        Route::delete('delete/{id}', 'LocationController@delete');
    });

    //Subscribes
    Route::group(['prefix' => 'subscribers'], function () {
        Route::get('list', 'SubscriberController@index')->name('subscribers.list');
        Route::get('json-list', 'SubscriberController@jsonList');
        Route::delete('delete/{id}', 'SubscriberController@delete');
        Route::get('export', 'SubscriberController@export')->name('subscribers.export');
    });

    //Configsite
    Route::group(['prefix' => 'configsite'], function () {
        Route::get('edit', 'ConfigsiteController@edit')->name('configsite.edit');
        Route::post('edit', 'ConfigsiteController@update');
    });

    //Account
    Route::group(['prefix' => 'account'], function () {
        Route::get('edit', 'AccountController@edit')->name('account.edit');
        Route::post('edit', 'AccountController@update');
    });
});

Auth::routes();

Route::get('login', 'HomeController@login')->name('login');
Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

Route::get('/test-firebase', [TestController::class, 'index']);

