<x-layout>
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
</x-layout>