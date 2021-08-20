<?php

namespace App\Http\Controllers;

use App\Models\Comment\Service;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $commentService;

    public function __construct()
    {
        $this->commentService = new Service();
    }

    public function addComment(Request $request, $post_id)
    {
        return $this->commentService->addComment($request,$post_id);
    }

    public function getAllComments()
    {
        return $this->commentService->getAllComments();
    }

    public function getAllCommentsForPostId($post_id)
    {
        return $this->commentService->getAllCommentsForPostId($post_id);
    }

    public function getAllCommentsForUserId($user_id)
    {
        return $this->commentService->getAllCommentsForUserId($user_id);
    }

    public function getCommentById($comment_id)
    {
        return $this->commentService->getCommentById($comment_id);
    }
}
