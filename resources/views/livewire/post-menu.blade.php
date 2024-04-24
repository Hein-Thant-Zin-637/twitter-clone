<div class="dropleft" data-toggle="tooltip" data-placement="top" title="" data-original-title="more">
    <span data-toggle="dropdown" aria-expanded="false">
        <svg viewBox="0 0 24 24" aria-hidden="true" class="blue"
            style="height:1.25rem;width:1.25rem; line-height: 1.65em; cursor: pointer;">
            <g>
                <circle cx="5" cy="12" r="2"></circle>
                <circle cx="12" cy="12" r="2"></circle>
                <circle cx="19" cy="12" r="2"></circle>
            </g>
        </svg></span>

    <div class="dropdown-menu p-3">
        @if ($post->user_id === auth()->user()->id)
            <button wire:click.prevent="deletePost({{ $post->id }})"
                class="bg-white border-0 text-danger d-flex align-items-center div-info-more-item dropdown-item">
                <div>
                    <img src="/svg/delete.svg" alt="" style="width: 20px; height: 20px;">
                </div>
                <div class="ml-2"><span>Delete</span></div>
            </button>
            <div>
                @if (auth()->user()
                        ?->hasPin($post->id))
                    <button wire:click.prevent="unpin({{ $post->id }})"
                        class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                        <div>
                            <img src="/svg/pin.svg" alt="" style="width: 23px; height: 23px;">
                        </div>
                        <div class="ml-2 ms-1"><span>UnPin Post</span></div>
                    </button>
                @else
                    <button wire:click="pin({{ $post->id }})"
                        class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                        <div>
                            <img src="/svg/pin.svg" alt="" style="width: 23px; height: 23px;">
                        </div>
                        <div class="ml-2 ms-1"><span>Pin Post</span></div>
                    </button>
                @endif
            </div>
        @else
            <div>
                @if (auth()->user()
                        ?->hasFollow($post->user_id))
                    <button wire:click.prevent="unfollow({{ $post->user_id }})"
                        class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                        <div>
                            <img src="/svg/unfollow.svg" alt="" style="width: 23px; height: 23px;">
                        </div>
                        <div class="ml-2"><span>UnFollow {{ '@' . $post->user->user_name }}</span></div>
                    </button>
                @else
                    <button wire:click.prevent="follow({{ $post->user_id }})"
                        class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                        <div>
                            <img src="/svg/follow.svg" alt="" style="width: 23px; height: 23px;">
                        </div>
                        <div class="ml-2"><span>Follow {{ '@' . $post->user->user_name }}</span></div>
                    </button>
                @endif
            </div>

            <div>
                @if (auth()->user()
                        ?->hasMute($post->user_id))
                    <button wire:click.prevent="unmute({{ $post->user_id }})"
                        class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                        <div>
                            <img src="/svg/unmute.svg" alt="" style="width: 23px; height: 23px;">
                        </div>
                        <div class="ml-2"><span>UnMute {{ '@' . $post->user->user_name }}</span></div>
                    </button>
                @else
                    <button wire:click.prevent="mute({{ $post->user_id }})"
                        class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                        <div>
                            <img src="/svg/mute.svg" alt="" style="width: 23px; height: 23px;">
                        </div>
                        <div class="ml-2"><span>Mute {{ '@' . $post->user->user_name }}</span></div>
                    </button>
                @endif
            </div>

            <div>
                <button wire:click.prevent="block({{ $post->user_id }})"
                    class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                    <div>
                        <img src="/svg/block.svg" alt="" style="width: 20px; height: 20px;">
                    </div>
                    <div class="ml-2"><span>Block {{ '@' . $post->user->user_name }}</span></div>
                </button>
            </div>
            <div>
                <livewire:report :post="$post" />
            </div>


        @endif

    </div>
</div>
