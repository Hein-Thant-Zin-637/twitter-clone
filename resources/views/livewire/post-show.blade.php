<div>
    @foreach ($posts as $post)
        <li class="list-group-items mb-3 card">
            <article href="/qiongliwu/posts/27294">
                {{-- head --}}
                <div class="d-inline-flex" style="width:100%">
                    <a href="#">
                        <div class="info_author_photo pl-2 pt-2">
                            <img src="{{ asset($post->user->profile ?? 'profile_default_image.jpg') }}" alt="..."
                                style="width:3rem;height:3rem" class="mr-3 rounded-circle">
                        </div>
                    </a>
                    <div class="flex-fill pt-2">
                        <div class="d-flex">
                            <div class="d-flex info_author">
                                <div style="align-items: center;">
                                    <div class="d-flex flex-row gap-1 mt-2">
                                        <a href="#"class="text-a">
                                            <div style="line-height:100%">
                                                <span class="v-text-s">{{ $post->user->name }}</span>
                                            </div>
                                        </a>
                                        <div class="pl-2 text-m">
                                            <span class="text-to">{{ $post->user->user_name }}</span>
                                        </div>
                                        <div class="pl-2">
                                            <p class="text-muted">{{ $post->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- dropdown --}}
                            <div class=" el-action-s  pl-2 pr-2 rounded-circle ml-auto">
                                <div class="dropleft" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="more">
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
                                                    <img src="/svg/delete.svg" alt=""
                                                        style="width: 20px; height: 20px;">
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
                            </div>
                        </div>
                        {{-- description --}}
                        <div class="info-intro">{{ $post->description }}</div>
                        {{-- image --}}
                        <div class="row w-100 mt-3">
                            @foreach ($post->medias as $image)
                                @if ($loop->index > 3)
                                @break
                            @endif
                            <div class="<?php if (count($post->medias) == 1) {
                                echo 'col-12';
                            } elseif (count($post->medias) == 3) {
                                echo 'col-4';
                            } else {
                                echo 'col-6';
                            } ?> p-0">
                                <img src="{{ asset($image->media) }}" alt=""
                                    style="width: 100%; height: auto;">
                            </div>
                        @endforeach
                    </div>
                    {{-- footer --}}
                    <div class="d-flex justify-content-between p-3">
                        <div>
                            <a href=""
                                class="text-dark text-decoration-none d-flex align-items-center gap-2">
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
                                        <img src="/svg/bookmark.svg" alt=""
                                            style="width: 23px; height: 23px;">
                                    </button>
                                @endif
                            </div>
                            <a href="">
                                <img src="/svg/share.svg" alt="" style="width: 23px; height: 23px;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </li>
@endforeach

</div>
