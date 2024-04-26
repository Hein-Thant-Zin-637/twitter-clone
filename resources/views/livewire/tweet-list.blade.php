<div>
    <p>Pin Posts</p>
    <div>
        @forelse ($pins as $post)
            <livewire:post-show :post="$post" :key="$post->id">
        @empty
            <p>No Pin post</p>
        @endforelse
    </div>
    <p>Tweets</p>
    <div>
        @foreach ($tweets as $post)
            @if ($post->user?->hasPin($post->id))
                @continue
            @endif
            <livewire:post-show :post="$post" :key="$post->id">
        @endforeach
    </div>
</div>
