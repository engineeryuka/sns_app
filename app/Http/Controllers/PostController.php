<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostRequest;
use \Auth;

class PostController extends Controller
{
    // 追加 岡本由 web.phpから移動
    // private $posts = [
    //     [
    //         'username' => 'ユーザー3',
    //         'created_at' => '2022-08-13 16:51',
    //         'body' => 'ユーザー3の初投稿です！',
    //     ],
    //     [
    //         'username' => 'ユーザー2',
    //         'created_at' => '2022-08-13 16:42',
    //         'body' => 'ユーザー2の初投稿です！',
    //     ],
    //     [
    //         'username' => 'ユーザー1',
    //         'created_at' => '2022-08-13 16:38',
    //         'body' => 'ユーザー1の初投稿です！',
    //     ],
    // ];

    public function index() {

        // $posts = Post::all();
        $posts = Post::latest()->get();

        return view('index')
            // ->with(['posts' => $this->posts]);
            ->with(['posts' => $posts]);
    }

    public function create(PostRequest $request) {

        // $request->validate([
        //     'body' => 'required|max:140',
        // ],[
        //     'body.required' => '投稿内容は必須です',
        //     'body.max' => '140文字以内で入力してください',
        // ]);

        $post = new Post();
        $post->user_id = Auth::user()->id;
        // $post->username = Auth::user()->name;
        $post->body = $request->body;
        $post->save();

        return redirect()
            ->route('index');
    }

    public function show()
    {
        $login_user = Auth::user()->id;
        $user = User::find($login_user);

        return view('show')
            ->with(['user' => $user]);
    }

    public function edit(Post $post)
    {
        return view('edit')
            ->with(['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {

        // $request->validate([
        //     'body' => 'required|max:140',
        // ],[
        //     'body.required' => '投稿内容は必須です',
        //     'body.max' => '140文字以内で入力してください',
        // ]);

        $post->user_id = Auth::user()->id;
        // $post->username = Auth::user()->name;
        $post->body = $request->body;
        $post->save();

        return redirect()
            ->route('posts.detail', $post);
    }

    public function detail(Post $post) {
        return view('detail')
            ->with(['post' => $post]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        $login_user = Auth::user()->id;
        $user = User::find($login_user);

        return redirect()
            ->route('posts.show', $user);

    }
}
