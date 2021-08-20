<?php

namespace App\Http\Controllers;

use app\Models\Post\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function addPost(Request $request, $user_id)
    {
        return $this->postService->addPost($request,$user_id);
    }

    public function getAllPosts()
    {
        return $this->postService->getAllPosts();
    }

    public function getAllPostsForUserId($user_id)
    {
        return $this->postService->getAllPostsForUserId($user_id);
    }

    public function getPostById($post_id)
    {
        return $this->postService->getPostById($post_id);
    }
}
