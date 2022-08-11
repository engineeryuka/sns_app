<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>My SNS</title>
  <link rel="stylesheet" href="{{ url('css/style.css ')}}">
</head>
<body>
  <div class="container">
    <h1>投稿一覧</h1>
    @guest
      <a href="{{ route('login') }}">ログイン</a>
      <a href="{{ route('register') }}">新規登録</a>
    @else
      <textarea name=""></textarea>
      <button>投稿する</button>
      <form action="{{ route('logout') }}" method="post">
          @csrf
          <input type="submit" value="ログアウト">
      </form>
    @endguest

    <ul>
      <li>
        <p>ユーザー1 2022-08-11 21:12</p>
        <p>初投稿です！</p>
      </li>
    </ul>
  </div>
</body>
</html>