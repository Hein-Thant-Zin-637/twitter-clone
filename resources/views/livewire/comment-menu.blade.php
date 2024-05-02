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
        @if ($comment->user_id === auth()->user()->id)
            <button wire:click.prevent="deleteComment({{ $comment->id }})"
                class="bg-white border-0 text-danger d-flex align-items-center div-info-more-item dropdown-item">
                <div>
                    <img src="/svg/delete.svg" alt="" style="width: 20px; height: 20px;">
                </div>
                <div class="ml-2"><span>Delete</span></div>
            </button>
        @else
            <div>
                @if (auth()->user()
                        ?->hasFollow($comment->user_id))
                    <button wire:click.prevent="unfollow({{ $comment->user_id }})"
                        class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                        <div>
                            <img src="/svg/unfollow.svg" alt="" style="width: 23px; height: 23px;">
                        </div>
                        <div class="ml-2"><span>UnFollow {{ '@' . $comment->user->user_name }}</span></div>
                    </button>
                @else
                    <button wire:click.prevent="follow({{ $comment->user_id }})"
                        class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                        <div>
                            <img src="/svg/follow.svg" alt="" style="width: 23px; height: 23px;">
                        </div>
                        <div class="ml-2"><span>Follow {{ '@' . $comment->user->user_name }}</span></div>
                    </button>
                @endif
            </div>

            <div>
                @if (auth()->user()
                        ?->hasMute($comment->user_id))
                    <button wire:click.prevent="unmute({{ $comment->user_id }})"
                        class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                        <div>
                            <img src="/svg/unmute.svg" alt="" style="width: 23px; height: 23px;">
                        </div>
                        <div class="ml-2"><span>UnMute {{ '@' . $comment->user->user_name }}</span></div>
                    </button>
                @else
                    <button wire:click.prevent="mute({{ $comment->user_id }})"
                        class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                        <div>
                            <img src="/svg/mute.svg" alt="" style="width: 23px; height: 23px;">
                        </div>
                        <div class="ml-2"><span>Mute {{ '@' . $comment->user->user_name }}</span></div>
                    </button>
                @endif
            </div>

            <div>
                <button wire:click.prevent="block({{ $comment->user_id }})"
                    class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                    <div>
                        <img src="/svg/block.svg" alt="" style="width: 20px; height: 20px;">
                    </div>
                    <div class="ml-2"><span>Block {{ '@' . $comment->user->user_name }}</span></div>
                </button>
            </div>
        @endif
    </div>
</div>
