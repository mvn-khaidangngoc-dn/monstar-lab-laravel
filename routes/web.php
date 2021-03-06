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

Route::resource('posts', PostsController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
