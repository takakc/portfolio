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
Route::get('/get-contact/{token}', 'ContactController@getContact');
Route::post('/post-contact', 'ContactController@postContact');
Route::get('/get-blogs', 'BlogController@getBlog');
Route::get('/get-blog/{name}', 'BlogDetailController@getBlogDetail');

Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');
