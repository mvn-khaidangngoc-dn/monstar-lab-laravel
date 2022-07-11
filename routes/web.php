<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
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
    return view('home');
});


Route::get('/users', 'UserController@index')->name('user.list');
Route::get('/users/create', 'UserController@create')->name('user.create');
Route::post('/users/create', 'UserController@store')->name('user.store');
Route::get('/users/edit/{id}', 'UserController@edit')->name('user.edit');
Route::put('/users/update/{id}', 'UserController@update')->name('user.update');
Route::get('/users/delete/{id}', 'UserController@destroy')->name('user.destroy');

Auth::routes();

Route::get('/posts', 'PostController@index')->name('posts.list');
Route::get('/posts/show/{post}', 'PostController@show')->name('posts.show')->middleware('can:view,App\Models\Post');
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::post('/posts/create', 'PostController@store')->name('posts.store')->middleware('can:create,App\Models\Post');
Route::get('/posts/edit/{id}', 'PostController@edit')->name('posts.edit')->middleware('can:update,App\Models\Post');
Route::put('/posts/update/{id}', 'PostController@update')->name('posts.update')->middleware('can:update,App\Models\Post');
Route::get('/posts/delete/{id}', 'PostController@destroy')->name('posts.destroy')->middleware('can:forceDelete,App\Models\Post');

// Route::resource('posts', PostController::class)->middleware([
//     'can:viewAny,App\Models\Post',
//     'can:view,App\Models\Post',
//     'can:create,App\Models\Post',
//     'can:update,App\Models\Post',
//     'can:delete,App\Models\Post',
// ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
