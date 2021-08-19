<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/users',[UserController::class,'getAllUsers']);
Route::get('/users/{user}',[UserController::class,'getUserById']);
Route::get('/users/{user}/posts',[PostController::class,'getAllPostsForUserId']);
Route::get('/users/{user}/posts/{post}',[PostController::class,'getPostByIdForUserId']);
Route::get('/posts/{post}/comments',[CommentController::class,'getAllCommentsForPostId']);
Route::get('/users/{user}/comments',[CommentController::class,'getAllCommentsForUserId']);
Route::get('/posts/{post}/comment/{comment}',[CommentController::class,'getCommentByIdForPostId']);

Route::post('/user',[UserController::class, 'addUser']);
Route::post('/user/{user}/post',[PostController::class, 'addPost']);
Route::post('/post/{post}/comment',[CommentController::class, 'addComment']);

Route::delete('/user/{user}',[UserController::class, 'deleteUser']);
Route::delete('/post/{post}',[PostController::class, 'deletePost']);
Route::delete('/comment/{comment}',[CommentController::class, 'deleteComment']);
