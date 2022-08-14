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
        &laquo; <a href="{{ route('index') }}">投稿一覧へ戻る</a>
      </div>
      <h2>{{ \Auth::user()->name }}さんの投稿一覧</h2>
      <ul>
        @forelse ($user->posts()->latest()->get() as $post)
          <li>
            <div class="management">
              <a href="{{ route('posts.edit', $post) }}">[編集]</a>
              <form method="post" action="{{ route('posts.destroy', $post) }}">
                @method('DELETE')
                @csrf
                <button class="btn">[✖]</button>
              </form>
            </div>
            @if ($post->created_at <> $post->updated_at)
              <p class="editcheck">編集済み</p>
            @endif
            <p>{{ $post->username }} {{ $post->created_at }}</p>
            <p>{!! nl2br(e($post->body)) !!}</p>
          </li>
        @empty
          <li>投稿はまだありません！</li>
        @endforelse
      </ul>
    </div>
  </main>
</body>
</html>