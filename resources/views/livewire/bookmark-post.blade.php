<div>
    @foreach ($posts  as $post)
        <livewire:post-show :post="$post" :key="$post->id">
    @endforeach
</div>
