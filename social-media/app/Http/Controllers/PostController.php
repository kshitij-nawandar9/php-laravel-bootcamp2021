<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function addPost(Request $request,$user_id)
    {
        $content = $request->input('content');
        $id=DB::table('posts')->insertGetId([
            'content'=>$content,
            'user_id'=>$user_id
        ]);
        return $id;
    }

    public function getAllPostsForUserId($user_id)
    {
        $posts = DB::table('posts')
            ->where('user_id','=',$user_id)
            ->get();
        return $posts;
    }

    public function getPostByIdForUserId($user_id,$post_id)
    {
        $posts = DB::table('posts')
            ->where('id','=',$post_id)
            ->where('user_id','=',$user_id)
            ->get();
        return $posts;
    }
}
