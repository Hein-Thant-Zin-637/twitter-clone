<div>
    @forelse ($reposts as $post)
        <livewire:post-show :post="$post" :key="$post->id">
        @empty
            <p>No Repost post</p>
    @endforelse
</div>
