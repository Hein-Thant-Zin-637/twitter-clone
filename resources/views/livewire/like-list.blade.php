<div>
    @forelse ($likes as $post)
        <livewire:post-show :post="$post" :key="$post->id">
    @empty
        <p>No Likes post</p>
@endforelse
</div>
