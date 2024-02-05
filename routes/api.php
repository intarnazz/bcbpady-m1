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
use App\Http\Controllers\Posts\GetPosts;

Route::get('/GetUsers', [GetUsers::class, 'GetAll']);
Route::get('/GetPosts', [GetPosts::class, 'GetAll']);





