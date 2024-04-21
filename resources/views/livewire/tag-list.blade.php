<div>
    @foreach ($tags as $tag)
    @if ($loop->index > 6)
        @break
    @endif
    <div class="d-flex align-items-center p-2 tagdiv">
        <div>
            <div class="v-text">
                <a href="https://merchantface.com/tags/office-desk" class="text-a fs-6">{{ $tag->name }}</a>
            </div>
            <div class="d-flex">
                <div class="text-ms"><span>{{$tag->posts->count()}}</span>&nbsp;posts</div>
            </div>
    
        </div>
        <div class="ml-auto">
            <svg viewBox="0 0 24 24" aria-hidden="true" class="blue"
                style="height:1.25rem;width:1.25rem; line-height: 1.65em; cursor: pointer;">
                <g>
                    <circle cx="5" cy="12" r="2"></circle>
                    <circle cx="12" cy="12" r="2"></circle>
                    <circle cx="19" cy="12" r="2"></circle>
                </g>
            </svg>
        </div>
    </div>
    @endforeach
</div>