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
          @guest
            <!-- <a href="{{ route('login') }}">ログイン</a>
            <a href="{{ route('register') }}">新規登録</a> -->
            <li>
              <button onclick="location.href='{{ route('login') }}'">ログイン</button>
            </li>
            <li>
              <button onclick="location.href='{{ route('register') }}'">新規会員登録</button>
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
        <form method="post" action="{{ route('posts.create') }}">
          @csrf
          <div class="form-post">
            <textarea name="body">{{ old('body') }}</textarea>
            @error('body')
              <div class="error">{{ $message }}</div>
            @enderror
            <button>投稿する</button>
          </div>
        </form>
      @endauth
      
      <h2>
        <span>投稿一覧</span>
        @auth
          <button onclick="location.href='{{ route('posts.show') }}'">投稿を管理する</button>
        @endauth
      </h2>

      <ul>

        @forelse ($posts as $post)
        <li>
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