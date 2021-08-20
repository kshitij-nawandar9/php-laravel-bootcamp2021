<?php

namespace App\Http\Controllers;

use App\Models\Post\Service;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postService;

    public function __construct()
    {
        $this->postService = new Service();
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
