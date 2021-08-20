<?php

namespace app\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentService
{
    public function addComment(Request $request, $post_id)
    {
        $validator = Validator::make($request->all(), [
            'content' => ['required', 'max:255'],
            'user_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $content = $request->input('content');
        $user_id = $request->input('user_id');
        $id = DB::table('comments')->insertGetId([
            'content' => $content,
            'user_id' => $user_id,
            'post_id' => $post_id
        ]);
        return $this->getCommentById($id);
    }

    public function getAllComments()
    {
        $comments = DB::table('comments')->get();
        return $comments;
    }

    public function getAllCommentsForPostId($post_id)
    {
        $comments = DB::table('comments')
            ->where('post_id', '=', $post_id)
            ->get();
        return $comments;
    }

    public function getAllCommentsForUserId($user_id)
    {
        $comments = DB::table('comments')
            ->where('user_id', '=', $user_id)
            ->get();
        return $comments;
    }

    public function getCommentById($comment_id)
    {
        $comments = DB::table('comments')
            ->where('id', '=', $comment_id)
            ->get();
        return $comments;
    }
}
