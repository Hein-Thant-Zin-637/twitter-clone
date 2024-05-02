<div>
@foreach ($posts as $post)
@if ((auth()->user()?->hasMute($post->user_id)))
@continue
@endif
@if ((auth()->user()?->hasBlock($post->user_id)))
@continue
@endif
@if ((auth()->user()?->hasBlocked($post->user_id)))
@continue
@endif
    <livewire:post-show :post="$post" :key="$post->id">
@endforeach
</div>
