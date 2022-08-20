<x-layout>
  <div class="back-link">
    &laquo; <a href="{{ route('index') }}">投稿一覧へ戻る</a>
  </div>
  <h2>{{ \Auth::user()->name }}さんの投稿一覧</h2>
  <ul>
    @forelse ($user->posts()->latest()->get() as $post)
      <li>
        <div class="management">
          <a href="{{ route('posts.edit', $post) }}">[編集]</a>
          <form method="post" action="{{ route('posts.destroy', $post) }}" class="delete-post">
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
        <p class="comment_link"><a href="{{ route('posts.detail', $post) }}">コメント</a></p>
      </li>
    @empty
      <li>投稿はまだありません！</li>
    @endforelse
  </ul>

  <script>
    'use strict';
    {
      document.querySelectorAll('.delete-post').forEach(form => {
        form.addEventListener('submit', e => {
          e.preventDefault();

          if (!confirm('削除してもよいですか?')) {
            return;
          }

          form.submit();
        });
      });

    }
  </script>
</x-layout>