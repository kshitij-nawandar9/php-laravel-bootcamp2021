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

//User APIs
Route::get('/users',[UserController::class,'getAllUsers']);
Route::get('/users/{user}',[UserController::class,'getUserById']);
Route::post('/users',[UserController::class, 'addUser']);

//Post APIs
Route::get('/posts',[PostController::class,'getAllPosts']);
Route::get('/posts/{post}',[PostController::class,'getPostById']);
Route::get('/users/{user}/posts',[PostController::class,'getAllPostsForUserId']);
Route::post('/users/{user}/posts',[PostController::class, 'addPost']);

//Comment APIs
Route::get('/comments',[CommentController::class,'getAllComments']);
Route::get('/comments/{comments}',[CommentController::class,'getCommentById']);
Route::get('/posts/{post}/comments',[CommentController::class,'getAllCommentsForPostId']);
Route::get('/users/{user}/comments',[CommentController::class,'getAllCommentsForUserId']);
Route::post('/posts/{post}/comments',[CommentController::class, 'addComment']);




//Route::delete('/user/{user}',[UserController::class, 'deleteUser']);
//Route::delete('/post/{post}',[PostController::class, 'deletePost']);
//Route::delete('/comment/{comment}',[CommentController::class, 'deleteComment']);
