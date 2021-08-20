<?php

namespace app\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostService
{
    public function addPost(Request $request, $user_id)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'content' => ['required', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $title = $request->input('title');
        $content = $request->input('content');
        $id = DB::table('posts')->insertGetId([
            'title' => $title,
            'content' => $content,
            'user_id' => $user_id
        ]);
        return $this->getPostById($id);
    }

    public function getAllPosts()
    {
        $posts = DB::table('posts')->get();
        return $posts;
    }

    public function getAllPostsForUserId($user_id)
    {
        $posts = DB::table('posts')
            ->where('user_id', '=', $user_id)
            ->get();
        return $posts;
    }

    public function getPostById($post_id)
    {
        $posts = DB::table('posts')
            ->where('id', '=', $post_id)
            ->get();
        return $posts;
    }
}
