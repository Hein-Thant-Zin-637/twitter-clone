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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Profile Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="myform" action="{{ route('update-profile') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="form-group background">


                                <img id="cover"
                                    src="{{ $user->cover_photo ? '/storage/' . $user->cover_photo : 'https://t4.ftcdn.net/jpg/02/40/63/55/360_F_240635575_EJifwRAbKsVTDnA3QE0bCsWG5TLhUNEZ.jpg' }}"
                                    class="coverPhoto" alt="">

                                <label for="coverinput" class="fs-5 btn btn-light opacity-25 editCover"><i
                                        class="fa-solid fa-image"></i></label>
                                <input type="file" id="coverinput" name="cover" hidden>
                                <img id="profileimage" class="profile rounded-circle"
                                    src=" {{ $user->profile ? '/storage/' . $user->profile : 'profile_default_image.jpg' }}"
                                    class="coverPhoto" alt="">

                                <label for="profileinput" class="fs-5 btn btn-light opacity-25 editProfile"><i
                                        class="fa-solid fa-image"></i></label>
                                <input value="ok" type="file" id="profileinput" name="profile" hidden>
                            </div>
                            <div class="form-group mt-5">
                                <label for="name" class="text-primary mt-5">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Name" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="bio" class="text-primary mt-3">Bio</label>
                                <textarea class="form-control" id="bio" name="bio" rows="3">{{ $user->bio }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="location" class="text-primary mt-3">Location</label>
                                <input type="text" class="form-control" name="location" id="location"
                                    placeholder="Location" value="{{ $user->location }}">
                            </div>

                            <div class="form-group">
                                <label for="website" class="text-primary mt-3">Website</label>
                                <input type="text" class="form-control" name="website" id="website"
                                    placeholder="Website" value="{{ $user->website }}">
                            </div>

                            <div class="form-group">
                                <label for="phone" class="text-primary mt-3">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                    placeholder="Phone" value="{{ $user->phone }}">
                            </div>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" form="myform" class="btn btn-primary">Save
                            changes</button>
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
                <form action="{{ route('conversation', $user->id) }}">
                    @csrf
                    <button type="submit" class="border border-dark p-2 rounded-circle">
                        <img src="/svg/message.svg" alt="" style="width: 20px; height: 20px;">
                    </button>
                </form>

            </div>
            <div>
                <livewire:follow-button :user="$user">
            </div>
        </div>
    @endif
</div>
