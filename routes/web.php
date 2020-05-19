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
// auth
Auth::routes();

// home
Route::get('/', 'PostController@index');

// posts
Route::resource('posts', 'PostController');

//comments
Route::resource('comments', 'CommentController')->only([
    'store', 'update', 'destroy'
]);

// admin
Route::get('/admin/{any?}', function() {
    return view('layouts.admin');
})->where('any', '.*')->middleware('auth');

