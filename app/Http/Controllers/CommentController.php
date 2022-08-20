<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use \Auth;

class CommentController extends Controller
{
    public function create(PostRequest $request, Post $post) {

        // $request->validate([
        //     'body' => 'required|max:140',
        // ],[
        //     'body.required' => '投稿内容は必須です',
        //     'body.max' => '140文字以内で入力してください',
        // ]);

        $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->user_id = Auth::user()->id;
        // $post->username = Auth::user()->name;
        $comment->body = $request->body;
        $comment->save();

        return redirect()
            ->route('posts.detail', $post);
    }
}
