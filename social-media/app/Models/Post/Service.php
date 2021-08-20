<?php

namespace app\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Service
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
        return DB::table('posts')->get();
    }

    public function getAllPostsForUserId($user_id)
    {
        return DB::table('posts')
            ->where('user_id', '=', $user_id)
            ->get();
    }

    public function getPostById($post_id)
    {
        return DB::table('posts')
            ->where('id', '=', $post_id)
            ->get();
    }
}
