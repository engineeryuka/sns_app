<?php
  // dd($ppps);
  // exit;
  // $user = auth()->user();
  // $id = auth()->id();
  // $username = \Auth::user()->name;
  // echo $username;
  // dd($user);
  // exit;
  // $url1 = url()->previous();
  // $url2 = route('index');
  // $url3 = route('posts.edit', $post);
  // echo $url1 . '<br>';
  // echo $url2 . '<br>';
  // echo $url3;
  // exit;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>My SNS</title>
  <link rel="stylesheet" href="{{ url('css/style.css ')}}">
</head>
<body>
  <header>
    <div class="container">
      <h1>ららべる SNS</h1>
        <ul>
          <li>
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" value="ログアウト">
              </form>
          </li>
        </ul>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="back-link">
        @if (url()->previous() == route('posts.edit', $post) || url()->previous() == route('posts.show'))
          &laquo; <a href="{{ route('posts.show') }}">投稿管理へ戻る</a>
        @else
          &laquo; <a href="{{ route('index') }}">投稿一覧へ戻る</a>
        @endif
      </div>
      <!-- <h2>{{ \Auth::user()->name }}さんの投稿詳細</h2> -->
      <h2>{{ $post->user->name }}さんの投稿詳細</h2>
        <p>{!! nl2br(e($post->body)) !!}</p>
      <h3>コメント</h3>
        <!-- @auth -->
          <form method="post" action="{{ route('comments.create', $post) }}">
            @csrf
            <div class="form-input">
              <textarea name="body">{{ old('body') }}</textarea>
              @error('body')
                <div class="error">{{ $message }}</div>
              @enderror
              <button>追加</button>
            </div>
          </form>
        <!-- @endauth -->
      <ul>
        @forelse ($post->comments()->latest()->get() as $comment)
          <li>
            <p><span class="user_name">{{ $comment->user->name }}</span> {{ $comment->created_at }}</p>
            <p>{!! nl2br(e($comment->body)) !!}</p>
          </li>
        @empty
          <li>コメントはまだありません！</li>
        @endforelse
      </ul>
    </div>
  </main>
</body>
</html>