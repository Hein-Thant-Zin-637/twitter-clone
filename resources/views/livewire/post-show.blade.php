<div>
    <li class="list-group-items mb-3 card">
        <a href="{{ route('postdetail', ['user_name' => $post->user->user_name, 'id' => $post->id]) }}"
            class="text-dark text-decoration-none">
            {{-- head --}}
            <article>
                <div class="d-inline-flex" style="width:100%">
                    <div>
                        <button type="button" onclick="event.preventDefault();window.location='{{ route('profile',$post->user->user_name) }}'" class="info_author_photo bg-white border-0 pl-2 pt-2">
                            <img src="{{ $post->user->profile ?? '/profile_default_image.jpg'}}" alt="..."
                                style="width:3rem;height:3rem" class="mr-3 rounded-circle">
                        </button>
                    </div>
                    <div class="flex-fill pt-2">
                        <div class="d-flex">
                            <div class="d-flex info_author">
                                <div style="align-items: center;">
                                    <div class="d-flex flex-row gap-1 mt-2">
                                        <button type="button" onclick="event.preventDefault();window.location='{{ route('profile',$post->user->user_name) }}'"  class="text-a bg-white border-0 pb-3 fs-6">
                                            <div style="line-height:100%">
                                                <span class="v-text-s">{{ $post->user->name }}</span>
                                            </div>
                                        </button>
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
                                <livewire:post-menu :post="$post">
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
                                <img src="{{ asset("/storage/".$image->media) }}" alt=""
                                    style="width: 100%; height: auto;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- footer --}}
            <div>
                <livewire:post-footer :post="$post">
            </div>
            
        </article>
    </a>

</li>
</div>
