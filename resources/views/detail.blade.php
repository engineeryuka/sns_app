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
      <h2>{{ \Auth::user()->name }}さんの投稿詳細</h2>
        <p>{!! nl2br(e($post->body)) !!}</p>
    </div>
  </main>
</body>
</html>