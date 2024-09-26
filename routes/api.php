<?php

use App\Http\Controllers\Api\Admin\AdminController;
use App\Http\Controllers\Api\Admin\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogCategoryController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\User\UserController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\ClientController;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;
use Laravel\Passport\Http\Controllers\TransientTokenController;

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

Route::post('/oauth/token', [AccessTokenController::class, 'issueToken']);
Route::post('/oauth/token/refresh', [AccessTokenController::class, 'refresh']);
Route::post('/oauth/authorize', [AuthorizationController::class, 'authorize']);
Route::post('/oauth/clients', [ClientController::class, 'store']);
Route::post('/oauth/personal-access-tokens', [PersonalAccessTokenController::class, 'store']);
Route::post('/oauth/transient-tokens', [TransientTokenController::class, 'store']);

Route::get('/login', [AuthController::class, 'default'])->name('login');

Route::middleware('api')->post('login', [AuthController::class, 'login']);
Route::middleware('api')->post('loginPasswordType', [AuthController::class, 'loginPasswordType']);
Route::get('blog', [BlogController::class, 'index']);

Route::middleware(['auth:api', 'scope:admin'])->group(function () {

    // Users
    Route::get('users', [AdminController::class, 'index']);
    Route::post('users', [AdminController::class, 'store']);
    Route::get('users/{id}', [AdminController::class, 'show']);
    Route::put('users/{id}', [AdminController::class, 'update']);
    Route::delete('users/{id}', [AdminController::class, 'destroy']);
    // Blogs
    Route::post('blog-category/create', [BlogCategoryController::class, 'create']);
    Route::get('blog-category', [BlogCategoryController::class, 'index']);
    Route::delete('blog/{id}', [BlogController::class, 'destroy']);

    Route::post('admin/logout', [AuthController::class, 'logout']);
});
Route::middleware(['auth:api', 'scope:user'])->group(function () {
    Route::get('blog/create', [BlogController::class, 'create']);
    Route::post('blog/store', [BlogController::class, 'store']);
    Route::post('blog/comment', [CommentController::class, 'create']);

    // Users
    Route::put('profile', [UserController::class, 'update']);
    Route::post('logout', [UserController::class, 'logout']);
});

//////// Basic Auth 
Route::middleware(['basic.auth'])->group(function () {
    Route::get('blog/{id}', [BlogController::class, 'show']);
    Route::get('service', [ServiceController::class, 'index']);
    Route::get('service/{id}', [ServiceController::class, 'show']);
});
