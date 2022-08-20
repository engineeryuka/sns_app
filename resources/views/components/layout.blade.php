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
              {{ \Auth::user()->name }}さん
            </li>
            <li>
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" value="ログアウト">
              </form>
            </li>
            <li>
              <form action="{{ route('withdrawal') }}" method="post" class="withdrawal">
                @method('DELETE')
                @csrf
                <input type="submit" value="退会">
              </form>
            </li>
          @endguest
        </ul>
    </div>
  </header>

  <main>
    <div class="container">
      {{ $slot }}
    </div>
  </main>
  
  @auth
    <script>
      'use strict';
      {
        document.querySelectorAll('.withdrawal').forEach(form => {
          form.addEventListener('submit', e => {
            e.preventDefault();

            if (!confirm('本当に退会してもよいですか?')) {
              return;
            }

            form.submit();
          });
        });
      }
    </script>
  @endauth
</body>
</html>