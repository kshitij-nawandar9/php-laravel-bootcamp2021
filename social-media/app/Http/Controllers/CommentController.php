<?php

namespace App\Http\Controllers;

use app\Models\Comment\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    private $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
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
