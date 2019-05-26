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

Route::prefix('articles')->group(function () {
    $controller = 'Web\ArticleController';
    Route::get('/', $controller . '@index')->name('articles.index');
    Route::post('/store', $controller . '@store')->name('articles.store');
    Route::get('/{id}', $controller . '@read')->name('articles.read');
    Route::post('/{id}/update', $controller . '@update')->name('articles.update');
    Route::post('/{id}/delete', $controller. '@delete')->name('articles.delete');
});