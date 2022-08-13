<?php
  // dd($ppps);
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
          @guest
            <!-- <a href="{{ route('login') }}">ログイン</a>
            <a href="{{ route('register') }}">新規登録</a> -->
            <li>
              <button onclick="location.href='{{ route('login') }}'">ログイン</button>
            </li>
            <li>
              <button onclick="location.href='{{ route('register') }}'">新規登録</button>
            </li>
          @else
            <li>
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" value="ログアウト">
              </form>
            </li>
          @endguest
        </ul>
    </div>
  </header>

  <main>
    <div class="container">
      @auth
        <div class="form-post">
          <textarea name=""></textarea>
          <button>投稿する</button>
        </div>
      @endauth
      <h2>投稿一覧</h2>
      <ul>

        @forelse ($posts as $post)
        <li>
          <p>{{ $post->username }} {{ $post->created_at }}</p>
          <p>{{ $post->body }}</p>
        </li>
        @empty
          <li>投稿はまだありません！</li>
        @endforelse
      </ul>
    </div>
  </main>
</body>
</html>