<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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

        $posts = Post::all();

        return view('index')
            // ->with(['posts' => $this->posts]);
            ->with(['posts' => $posts]);
    }
}
