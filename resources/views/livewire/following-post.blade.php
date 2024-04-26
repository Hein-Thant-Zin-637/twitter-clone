<div>
    @foreach ($posts as $post)
        @if (!(auth()->user()?->hasFollow($post->user_id)))
            @continue
        @endif
        @if ((auth()->user()?->hasMute($post->user_id)))
        @continue
    @endif
        <livewire:post-show :post="$post" :key="$post->id">
    @endforeach
</div>
