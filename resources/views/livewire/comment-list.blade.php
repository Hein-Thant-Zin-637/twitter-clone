<div class="mt-5 " style="display: flex; flex-direction: column;">
    @forelse ($comments as $comment)
    <div  class="d-inline-flex mb-3 border border-gray-200 rounded pb-3 px-2 w-100" id="{{ $comment->id }}" >
        <div>
            <button type="button" onclick="event.preventDefault();window.location='{{ route('profile',$comment->user->user_name) }}'" class="info_author_photo bg-white border-0 pl-2 pt-3">
                <img src="{{ $comment->user->profile ?? '/profile_default_image.jpg'}}" alt="..."
                    style="width:3rem;height:3rem" class="mr-3 rounded-circle">
            </button>
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
                                <span class="text-to">{{ "@".$comment->user->user_name }}</span>
                            </div>
                            <div class="pl-2">
                                <p class="text-muted">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- dropdown --}}
                <div class=" el-action-s  pl-2 pr-2 rounded-circle ml-auto">
                    <livewire:comment-menu :comment="$comment">
                </div>
            </div>
            {{-- description --}}
            <div class="info-intro">{{ $comment->content }}</div>
        </div>
    </div>
    @empty
    <p>No Comments</p>
    @endforelse
</div>
