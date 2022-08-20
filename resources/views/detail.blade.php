<x-layout>
  <div class="back-link">
    @if (url()->previous() == route('posts.edit', $post) || url()->previous() == route('posts.show'))
      &laquo; <a href="{{ route('posts.show') }}">投稿管理へ戻る</a>
    @else
      &laquo; <a href="{{ route('index') }}">投稿一覧へ戻る</a>
    @endif
  </div>
  <!-- <h2>{{ \Auth::user()->name }}さんの投稿詳細</h2> -->
  <h2>{{ $post->user->name }}さんの投稿詳細</h2>
    <p>{!! nl2br(e($post->body)) !!}</p>
  <h3>コメント</h3>
    <!-- @auth -->
      <form method="post" action="{{ route('comments.create', $post) }}">
        @csrf
        <div class="form-input">
          <textarea name="body">{{ old('body') }}</textarea>
          @error('body')
            <div class="error">{{ $message }}</div>
          @enderror
          <button>追加</button>
        </div>
      </form>
    <!-- @endauth -->
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