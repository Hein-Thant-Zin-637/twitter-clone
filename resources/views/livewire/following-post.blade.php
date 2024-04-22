<div>
    @foreach ($posts as $post)
        @if (!(auth()->user()?->hasFollow($post->user_id)))
            @continue
        @endif
        <livewire:post-show :post="$post">
    @endforeach
</div>
