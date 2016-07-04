<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

    //Telegram chat-bot
    Route::post('/api', ['as' => 'message', 'uses' => 'TelegramBotController@getMessage']);

    //Search
    Route::post('search',
        ['as' => 'post_search', 'uses' => 'SearchPostsController@postSearch']);

    //Feedback
    Route::get('contact',
        ['as' => 'contact', 'uses' => 'AboutController@create']);
    Route::post('contact',
        ['as' => 'contact_store', 'uses' => 'AboutController@store']);

    //User information: profile, setting
    Route::get('user/settings', ['as' => 'settings', 'uses' => 'ProfileController@viewSettings']);
    Route::post('user/settings', 'ProfileController@saveSettings');
    Route::any('user/profile/{userId}', ['as' => 'profile', 'uses' => 'ProfileController@viewProfile']);

    // Authentication Routes
    Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

    // Registration Routes
    Route::get('auth/register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
    Route::post('auth/register', 'Auth\AuthController@postRegister');

    // Password Reset Routes
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');

    // Categories
    Route::resource('categories', 'CategoryController', ['except' => ['create']]);

    //Comments
    Route::resource('comments', 'CommentController', ['except'
                    => ['create', 'update', 'index', 'show', 'edit']]);

    //Blog pages
    Route::bind('blog', function ($slug) {
        return App\Post::where('slug', $slug)->firstOrFail();
    });
    Route::get('blog/{blog}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
        ->where('slug', '[\w\d\-\_]+');
    Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

    //Posts pages
    Route::resource('posts', 'PostController');

    //Main pages
    Route::get('/', 'PagesController@getIndex');
    Route::get('about', 'PagesController@getAbout');
