<x-layout>
  @auth
    <form method="post" action="{{ route('posts.create') }}">
      @csrf
      <div class="form-input">
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
      <p><span class="user_name">{{ $post->user->name }}</span> {{ $post->created_at }}</p>
      <p>{!! nl2br(e($post->body)) !!}</p>
      <p class="comment_link"><a href="{{ route('posts.detail', $post) }}">コメント</a></p>
    </li>
    @empty
      <li>投稿はまだありません！</li>
    @endforelse
  </ul>

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
</x-layout>