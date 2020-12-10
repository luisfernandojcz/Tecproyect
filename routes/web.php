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

Route::resource('admin/categories', 'CategoryController')->names('categories');
Route::resource('admin/subcategories', 'SubcategoryController')->names('subcategories');
Route::resource('admin/tags', 'TagController')->names('tags');
Route::resource('admin/posts', 'PostController')->names('posts');
Route::resource('admin/products', 'ProductController')->names('products');
Route::post('/comment/store','CommetController@store')->name('comment.add');
Route::post('/reply/store','CommetController@replyStore')->name('reply.add');

Route::post('/commentProduct/store','CommetController@productStore')->name('productComment.add');
Route::post('/replyProduct/store','CommetController@productReplyStore')->name('productReply.add');


Route::delete('/reply/destroy/{commet}','CommetController@destroy')->name('comment.destroy');
Route::get('/reply/{commet}/edit','CommetController@edit')->name('comment.edit');
Route::put('/reply/{commet}','CommetController@update')->name('comment.update');





Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
