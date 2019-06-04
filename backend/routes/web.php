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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'middleware' => 'web',
    'prefix' => 'auth'
], function ($router) {
    $controller = 'Web\AuthController';

    Route::post('login', $controller . '@login');
    Route::post('logout', $controller . '@logout');
    Route::post('refresh', $controller . '@refresh');
    Route::post('me', $controller . '@me');
});

Route::prefix('articles')->group(function () {
    $controller = 'Web\ArticleController';
    Route::get('/', $controller . '@index')->name('articles.index');
    Route::get('/{id}', $controller . '@read')->name('articles.read');
});

Route::prefix('my/articles')->group(function () {
    $controller = 'Web\ArticleController';
    Route::get('/', $controller . '@index')->name('my.articles.index');
    Route::post('/store', $controller . '@store')->name('my.articles.store');
    Route::get('/{id}', $controller . '@read')->name('my.articles.read');
    Route::post('/{id}/update', $controller . '@update')->name('my.articles.update');
    Route::post('/{id}/delete', $controller. '@delete')->name('my.articles.delete');
});
