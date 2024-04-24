<div style="display: flex; flex-direction: column;">
    @foreach ($comments as $comment)
    <div  class="mb-3 w-100" id="{{ $comment->id }}" >
        <div onclick="window.location.href = {{ route('home') }}">
            <div class="info_author_photo pl-2 pt-2">
                <img src="{{ asset($comment->user->profile ?? 'profile_default_image.jpg') }}" alt="..."
                    style="width:3rem;height:3rem" class="mr-3 rounded-circle">
            </div>
        </div>
        <div class="flex-fill pt-2">
            <div class="d-flex">
                <div class="d-flex info_author">
                    <div style="align-items: center;">
                        <div class="d-flex flex-row gap-1 mt-2">
                            <div href="#"class="text-a">
                                <div style="line-height:100%">
                                    <span class="v-text-s">{{ $comment->user->name }}</span>
                                </div>
                            </div>
                            <div class="pl-2 text-m">
                                <span class="text-to">{{ $comment->user->user_name }}</span>
                            </div>
                            <div class="pl-2">
                                <p class="text-muted">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- description --}}
            <div class="info-intro">{{ $comment->content }}</div>
        </div>
    </div>
    @endforeach
</div>
