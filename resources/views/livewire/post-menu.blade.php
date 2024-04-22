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
            <button wire:click="deletePost({{ $post->id }})"
                class="bg-white border-0 text-danger d-flex align-items-center div-info-more-item dropdown-item">
                <div>
                    <img src="/svg/delete.svg" alt="" style="width: 20px; height: 20px;">
                </div>
                <div class="ml-2"><span>Delete</span></div>
            </button>
        @else
            <div class="d-flex div-info-more-item dropdown-item">
                <div>
                    <img src="/svg/report.svg" alt="">
                </div>
                <div class="ml-2"><span>Report post</span></div>
            </div>
        @endif

    </div>
</div>
