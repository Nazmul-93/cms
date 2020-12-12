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

Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

//Route::get('/blog','App\Http\Controllers\BlogController@index');
// Route::resource('/blog', \App\Http\Controllers\BlogController::class),
Route::prefix('admin')->group(function () {
    Route::resources([
        '/blog' => \App\Http\Controllers\BlogController::class,
        '/gallery' => \App\Http\Controllers\GalleryController::class,
        '/about' => \App\Http\Controllers\AboutController::class,
     ]);
    Route::get('delete_post/{id}','\App\Http\Controllers\BlogController@destroy')->name('deletePost');
    Route::get('delete_gallery_image/{id}','\App\Http\Controllers\GalleryController@destroy')->name('delete_gallery_image');
    Route::get('delete_about/{id}','\App\Http\Controllers\AboutController@destroy')->name('delete_about');
    
});



Route::get('/blog','App\Http\Controllers\FrontController@viewBlog')->name('blog');
Route::get('/gallery','App\Http\Controllers\FrontController@viewGallery')->name('gallery');
Route::get('/about','App\Http\Controllers\FrontController@viewAbout')->name('about');
Route::get('/','App\Http\Controllers\FrontController@viewHome')->name('home');
