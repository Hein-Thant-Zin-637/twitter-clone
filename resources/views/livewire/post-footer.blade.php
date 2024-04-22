<div class="d-flex justify-content-between p-3">
    <div>
        <a href="" class="text-dark text-decoration-none d-flex align-items-center gap-2">
            <img src="/svg/comment.svg" alt="" style="width: 23px; height: 23px;">
            <span>4</span>
        </a>
    </div>
    <div>
        @if (auth()->user()
                ?->hasRepost($post->id))
            <button wire:click="unrepost({{ $post->id }})"
                class="bg-white text-success border-0 d-flex align-items-center gap-2">
                <img src="/svg/repost.svg" alt=""
                    style="width: 30px; height: 30px; filter: invert(48%) sepia(56%) saturate(591%) hue-rotate(82deg) brightness(96%) contrast(93%);">
                <span>{{ $post->reposts->count() }}</span>
            </button>
        @else
            <button wire:click="repost({{ $post->id }})"
                class="bg-white border-0 d-flex align-items-center gap-2">
                <img src="/svg/repost.svg" alt="" style="width: 30px; height: 30px; ">
                <span>{{ $post->reposts->count() }}</span>
            </button>
        @endif

    </div>
    <div>
        @if (auth()->user()
                ?->hasLike($post->id))
            <button wire:click="unlike({{ $post->id }})"
                class="bg-white text-danger border-0 d-flex align-items-center gap-2">
                <img src="/svg/like_active.svg" alt=""
                    style="width: 23px; height: 23px; filter: invert(36%) sepia(79%) saturate(5099%) hue-rotate(338deg) brightness(91%) contrast(88%);">
                <span>{{ $post->likes->count() }}</span>
            </button>
        @else
            <button wire:click="like({{ $post->id }})"
                class="bg-white border-0 d-flex align-items-center gap-2">
                <img src="/svg/like.svg" alt="" style="width: 23px; height: 23px; ">
                <span>{{ $post->likes->count() }}</span>
            </button>
        @endif
    </div>
    <div class="d-flex flex-row gap-2">
        <div>
            @if (auth()->user()
                    ?->hasBookmark($post->id))
                <button wire:click="unbookmark({{ $post->id }})" class="bg-white border-0">
                    <img src="/svg/bookmark_active.svg" alt=""
                        style="width: 23px; height: 23px; filter: invert(40%) sepia(65%) saturate(4736%) hue-rotate(197deg) brightness(97%) contrast(114%);">
                </button>
            @else
                <button wire:click="bookmark({{ $post->id }})" class="bg-white border-0">
                    <img src="/svg/bookmark.svg" alt="" style="width: 23px; height: 23px;">
                </button>
            @endif
        </div>
        <a href="">
            <img src="/svg/share.svg" alt="" style="width: 23px; height: 23px;">
        </a>
    </div>
</div>