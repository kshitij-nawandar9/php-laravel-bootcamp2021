<?php

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
Route::get('/posts/{post}/comment/{user}',[CommentController::class,'getCommentByIdForPostId']);

Route::post('/user',[UserController::class, 'AddUser']);
Route::post('/user/{user}/post',[PostController::class, 'AddPost']);
Route::post('/post/{post}/comment',[CommentController::class, 'AddComment']);

Route::delete('/user/{user}',[UserController::class, 'DeleteUser']);
Route::delete('/post/{post}',[PostController::class, 'DeletePost']);
Route::delete('/comment/{comment}',[CommentController::class, 'DeleteComment']);
