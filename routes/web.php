<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;

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

Route::get('/',         [HomeController::class, 'index'])->name('home.index');
Route::get('/home',         [HomeController::class, 'index'])->name('home');

Route::get('/contact',  [HomeController::class, 'contact'])->name('home.contact');

Route::get('/about',    AboutController::class)->name('about.index');

Route::resource('posts',    PostsController::class);

Route::post('/comments',    [CommentsController::class, 'store'])->name('comments.store');

Auth::routes();
//Route::resource('posts', PostsController::class)->only(['index', 'show']);
//Route::resource('posts', PostsController::class)->except(['index', 'show']);
