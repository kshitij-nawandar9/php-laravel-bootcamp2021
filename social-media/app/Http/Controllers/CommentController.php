<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function addComment(Request $request,$user_id,$post_id)
    {
        $content = $request->input('content');
        $id=DB::table('comments')->insertGetId([
            'content'=>$content,
            'user_id'=>$user_id,
            'post_id'=>$post_id
        ]);
        return $id;
    }

    public function getAllCommentsForPostId($post_id)
    {
        $comments = DB::table('comments')
            ->where('post_id','=',$post_id)
            ->get();
        return $comments;
    }

    public function getAllCommentsForUserId($user_id)
    {
        $comments = DB::table('comments')
            ->where('user_id','=',$user_id)
            ->get();
        return $comments;
    }

    public function getCommentByIdForPostId($post_id,$comment_id)
    {
        $comments = DB::table('comments')
            ->where('id','=',$comment_id)
            ->where('post_id','=',$post_id)
            ->get();
        return $comments;
    }
}
