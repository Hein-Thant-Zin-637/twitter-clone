<div>
    @if ($user->id === auth()->user()->id)
        <!-- <a href="" class="btn btn-primary mt-5">Edit Profile</a> -->
        <button type="button" class="btn btn-outline-dark rounded-pill px-3 me-3" data-toggle="modal"
            data-target="#exampleModal">
            Edit Profile
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex flex-row align-items-center m-0 p-2 justify-content-between">
                        <div class="d-flex flex-row align-items-center gap-3">
                            <button type="button" onclick="event.preventDefault()" class="close h2 " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h5 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h5>
                        </div>
                        <div>
                            <button type="submit" form="myform" class="btn btn-dark rounded-pill" >&nbsp;Save&nbsp;</button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="myform" action="{{ route('update-profile') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group background ">
                                <img id="cover"
                                    src="{{ $user->cover_photo ? '/storage/' . $user->cover_photo : 'https://t4.ftcdn.net/jpg/02/40/63/55/360_F_240635575_EJifwRAbKsVTDnA3QE0bCsWG5TLhUNEZ.jpg' }}"
                                    class="coverPhoto" alt="">

                                <label for="coverinput" class="fs-5 btn btn-light opacity-25 editCover"><i
                                        class="fa-solid fa-image"></i></label>
                                <input type="file" id="coverinput" name="cover" hidden>
                                <img id="profileimage" class="profile rounded-circle"
                                    src=" {{ $user->profile ?? '/profile_default_image.jpg' }}"
                                    class="coverPhoto" alt="">

                                <label for="profileinput" class="fs-5 btn btn-light opacity-25 editProfile"><i
                                        class="fa-solid fa-image"></i></label>
                                <input value="ok" type="file" id="profileinput" name="profile" hidden>
                            </div>
                            <div class="form-floating mb-3" style="margin-top: 80px">
                                <input type="text" class="form-control shadow-none " id="name" placeholder="Name" name="name"  value="{{ $user->name }}">
                                <label for="name">Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control shadow-none" id="bio" name="bio" rows="5" placeholder="Bio" style="height: 100px">{{ $user->bio }}</textarea>
                                <label for="Bio">Bio</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control shadow-none" name="location" id="location"
                                    placeholder="Location" value="{{ $user->location }}">
                                <label for="Location" >Location</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control shadow-none" name="website" id="website"
                                    placeholder="Website" value="{{ $user->website }}">
                                <label for="Website" >Website</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control shadow-none" name="phone" id="phone"
                                    placeholder="Phone" value="{{ $user->phone }}">
                                <label for="Phone">Phone</label>
                            </div>

                        </form>

                    </div>
                   
                </div>
            </div>
        </div>
    @else
        <div class="d-flex flex-row gap-2 align-items-center me-3">
            <div class="dropleft border border-dark p-2 rounded-circle" data-toggle="tooltip" data-placement="top" title=""
                data-original-title="more">
                <span data-toggle="dropdown" aria-expanded="false">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="blue"
                        style="height:1.25rem;width:1.25rem; line-height: 1.65em; cursor: pointer;">
                        <g>
                            <circle cx="5" cy="12" r="2"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                            <circle cx="19" cy="12" r="2"></circle>
                        </g>
                    </svg>
                </span>

                <div class="dropdown-menu p-3">
                    <button type="button" id="copyLink" onclick="copyToClipboard('{{url('/')}}/{{ $user->user_name }}')" class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                        <div>
                            <img src="/svg/copylink.svg" alt="" style="width: 23px; height: 23px;">
                        </div>
                        <div class="ml-2"><span>CopyLInk {{ '@' . $user->user_name }}</span></div>
                    </button>
                    <div>
                        @if (auth()->user()
                                ?->hasMute($user->id))
                            <button wire:click.prevent="unmute({{ $user->id }})"
                                class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                                <div>
                                    <img src="/svg/unmute.svg" alt="" style="width: 23px; height: 23px;">
                                </div>
                                <div class="ml-2"><span>UnMute {{ '@' . $user->user_name }}</span></div>
                            </button>
                        @else
                            <button wire:click.prevent="mute({{ $user->id }})"
                                class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                                <div>
                                    <img src="/svg/mute.svg" alt="" style="width: 23px; height: 23px;">
                                </div>
                                <div class="ml-2"><span>Mute {{ '@' . $user->user_name }}</span></div>
                            </button>
                        @endif
                    </div>

                    <div>
                        <button wire:click.prevent="block({{ $user->id }})"
                            class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
                            <div>
                                <img src="/svg/block.svg" alt="" style="width: 20px; height: 20px;">
                            </div>
                            <div class="ml-2"><span>Block {{ '@' . $user->user_name }}</span></div>
                        </button>
                    </div>
                </div>
            </div>
            <div>
                <a href="#" class="border border-dark p-2 rounded-circle">
                    <img src="/svg/message.svg" alt="" style="width: 20px; height: 20px;">
                </a>
            </div>
            <div>
                <livewire:follow-button :user="$user">
            </div>
        </div>
    @endif
</div>
