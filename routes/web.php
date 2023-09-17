<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\SiteController::class,'home']);
Route::get('blog/{slug}',[\App\Http\Controllers\SiteController::class,'blog']);
Route::post('messages/send',[\App\Http\Controllers\MessageController::class,'send']);
Route::get('admin/messages',[\App\Http\Controllers\MessageController::class,'index']);
Route::delete('admin/messages/{id}',[\App\Http\Controllers\MessageController::class,'destroy']);

Auth::routes();

Route::view('admin','admin.home');

Route::resource('admin/education',\App\Http\Controllers\EducationController::class);
Route::resource('admin/experience',\App\Http\Controllers\ExperienceController::class);
Route::resource('admin/services',\App\Http\Controllers\ServiceController::class);
Route::resource('admin/categories',\App\Http\Controllers\CategoryController::class);
Route::resource('admin/projects',\App\Http\Controllers\ProjectController::class);
Route::resource('admin/posts',\App\Http\Controllers\PostController::class);

