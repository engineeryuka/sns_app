<?php
  // dd($ppps);
  // exit;
  // $user = auth()->user();
  // $id = auth()->id();
  // $username = \Auth::user()->name;
  // echo $username;
  // dd($user);
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
        &laquo; <a href="{{ route('posts.show') }}">戻る</a>
      </div>
      <h2>{{ \Auth::user()->name }}さんの投稿編集中</h2>
        <form method="post" action="{{ route('posts.update', $post) }}">
          @method('PATCH')
          @csrf

          <div class="form-group">
              <textarea name="body">{{ old('body', $post->body) }}</textarea>
            @error('body')
              <div class="error">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-button">
              <button>更新</button>
          </div>
        </form>

        <h3>コメント</h3>
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