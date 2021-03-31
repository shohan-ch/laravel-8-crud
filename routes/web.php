<?php

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

Route::get('/', function () {
    return view('welcome');
});


    /* Route::get('login/google', 'GoogleController@redirectToGoogle')->name('google');
Route::get('google/callback', 'GoogleController@handleGoogleCallback') */;
Route::resource('product', 'ProductController');

Route::get('login/github', 'SocialController@redirectToProvider')->name('github');
Route::get('login/github/callback', 'SocialController@handleProviderCallback');
/* 
Route::get('/products', 'ProductController@index')->name('product.index');
Route::get('products/add', 'ProductController@create')->name('product.create');
Route::post('products/add', 'ProductController@store')->name('product.store');
Route::get('products/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::put('products/{product}', 'ProductController@update')->name('product.update');
Route::get('products/{product}/delete', 'ProductController@destroy')->name('product.delete');
Route::get('products/{product}', 'ProductController@show')->name('product.show');
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
