<div>
    @foreach ($posts  as $post)
        <livewire:post-show :post="$post">
    @endforeach
</div>
