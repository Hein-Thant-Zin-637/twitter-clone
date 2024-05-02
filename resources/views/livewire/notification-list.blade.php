<div >
    @forelse ($notification as $noti)
        <div class="mb-2 ">
            <a href="{{ $noti->link }}"  class="text-dark <?php if(!($noti->is_read)){ echo 'bg-gray-200'; }  ?> text-decoration-none w-100 card p-3 border-1 rounded ">
                    <div class="d-flex flex-row" wire:click="haveRead({{$noti->id}})">
                        <div>
                            <button type="button"
                                onclick="event.preventDefault();window.location='{{ route('profile', $noti->action_user->user_name) }}'"
                                class="info_author_photo  border-0 pl-2 pt-2  <?=  ($noti->is_read) ? 'bg-white' : 'bg-gray-200'  ?>">
                                <img src="{{ $noti->action_user->profile ? '/storage/' . $noti->action_user->profile : 'profile_default_image.jpg' }}"
                                    alt="..." style="width:3rem;height:3rem" class="mr-3 rounded-circle ">
                            </button>
                        </div>
                        <div class="d-flex info_author">
                            <div style="align-items: center;">
                                <div class="d-flex flex-row gap-1 mt-2">
                                    <div class="text-a">
                                        <div style="line-height:100%">
                                            <span class="v-text-s">{{ $noti->action_user->name }}</span>
                                        </div>
                                    </div>
                                    <div class="pl-2 text-m">
                                        <span class="text-to">{{ $noti->action_user->user_name }}</span>
                                    </div>
                                    <div class="pl-2">
                                        <p class="text-muted">{{ $noti->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        {{ $noti->message }}
                                    </div>
                                    <div>
                                        {{ $noti->message($noti->link) ? $noti->message($noti->link)->content : '' }}
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
            </a>
        </div>
    @empty
        <p>You Dont Have Notification</p>
    @endforelse
</div>

