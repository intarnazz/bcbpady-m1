<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


use App\Http\Controllers\ControllersFlovers\Get\Flovers;

use App\Http\Controllers\Users\GetUsers;
use App\Http\Controllers\Posts\PostController;

Route::get('/GetUsers', [GetUsers::class, 'GetAll']);
Route::get('/GetPosts', [PostController::class, 'GetAll']);
Route::get('/GetPost/{id}', [PostController::class, 'GetPost']);
Route::get('/GetImg/{id}', [PostController::class, 'GetImg']);
Route::get('/PostDel/{id}', [PostController::class, 'PostDel']);
Route::get('/test', [PostController::class, 'test']);
Route::post('/PostPost', [PostController::class, 'PostPost']);





