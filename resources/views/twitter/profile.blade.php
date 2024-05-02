@extends('layouts.app')
@section('content')
    @include('livewire.modal')

    <div class="row w-100 v-body">

        <!-- middle column -->
        <div class="col-lg-8 col-md-12 border-end px-1" style="padding-left: 15px;">
            <!-- back arrow button -->
            <a href="/home" class="d-block"><i class="fa-solid fa-arrow-left"></i></a>

            <!-- cover and profile photo -->
            <div class="background">

                <img src="{{ $user->cover_photo ? '/storage/' . $user->cover_photo : 'https://t4.ftcdn.net/jpg/02/40/63/55/360_F_240635575_EJifwRAbKsVTDnA3QE0bCsWG5TLhUNEZ.jpg' }}"
                    class="coverPhoto" alt="">

                <img class="profile rounded-circle"
                    src="{{ $user->profile ?? '/profile_default_image.jpg' }}"
                    class="coverPhoto" alt="">

            </div>

            <!-- user info -->
            <div>
                <div class="d-flex justify-content-between">
                    <h4 class="pt-5 mb-0 mt-3" style="font-weight: bold;">{{ $user->name }}</h4>
                    <div class="mt-3">
                        <livewire:profile-menu :user="$user">
                    </div>

                </div>


                <p style=" color: gray; font-size: 16px;">{{ '@' . $user->user_name }}</p>
                <p class="mb-1" style=" font-size: 15px;">{{ $user->bio }}</p>

                <div class="d-flex" style="column-gap: 15px; color: gray; font-size: 15px;">

                    @if (!is_null($user->location))
                        <p class="mb-2"><i class="fa-solid fa-location-dot"></i> {{ $user->location }}</p>
                    @endif

                    @if (!is_null($user->dob))
                        <p class="mb-2"><i class="fa-solid fa-cake-candles"></i> {{ $user->dob }}</p>
                    @endif

                    @if (!is_null($user->website))
                        <p class="mb-3"><i class="fa-solid fa-link"></i> <a style="text-decoration: none !important;"
                                href="{{ $user->website }}" class="mb-0">{{ $user->website }}</a></p>
                    @endif

                    @if (!is_null($user->phone))
                        <p class="mb-2"><i class="fa-solid fa-phone"></i> 0{{ $user->phone }}</p>
                    @endif
                </div>

                <p style=" color: gray; font-size: 15px;"> {{ $user->following->count() ?? '0' }} following
                    {{ $user->followers->count() ?? '0' }} followers</p>

            </div>

            <!-- tab -->
            <ul class="nav nav-tab row mb-3" id="myTab" role="tablist">
                <li class="nav-item col-3" role="presentation">
                    <button class="nav-link text-dark fs-5 font-weight-bold active" id="tweets-tab" data-bs-toggle="tab"
                        data-bs-target="#tweets-tab-pane" type="button" role="tab" aria-controls="tweets-tab-pane"
                        aria-selected="true">Tweets</button>
                </li>
                <li class="nav-item col-3" role="presentation">
                    <button class="nav-link text-dark fs-5 font-weight-bold " id="replies-tab" data-bs-toggle="tab"
                        data-bs-target="#replies-tab-pane" type="button" role="tab"
                        aria-controls="replies-tab-pane" aria-selected="false">Replies</button>
                </li>
                <li class="nav-item col-3" role="presentation">
                    <button class="nav-link text-dark fs-5 font-weight-bold " id="multimedia-tab" data-bs-toggle="tab"
                        data-bs-target="#multimedia-tab-pane" type="button" role="tab"
                        aria-controls="multimedia-tab-pane" aria-selected="false">Multimedia</button>
                </li>
                <li class="nav-item col-3" role="presentation">
                    <button class="nav-link text-dark fs-5 font-weight-bold " id="likes-tab" data-bs-toggle="tab"
                        data-bs-target="#likes-tab-pane" type="button" role="tab" aria-controls="likes-tab-pane"
                        aria-selected="false">Likes</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <!-- Tweet -->
                <div class="tab-pane fade show active" id="tweets-tab-pane" role="tabpanel" aria-labelledby="tweets-tab"
                    tabindex="0">
                    <div>
                        <livewire:tweet-list :user="$user">
                    </div>
                </div>
                {{-- replies --}}
                <div class="tab-pane fade" id="replies-tab-pane" role="tabpanel" aria-labelledby="replies-tab"
                    tabindex="0">
                    <div>
                        <livewire:repost-list :user="$user">
                    </div>
                </div>
                {{-- multimedia --}}
                <div class="tab-pane fade" id="multimedia-tab-pane" role="tabpanel" aria-labelledby="multimedia-tab"
                    tabindex="0">
                   <div class="row">
                    @foreach ($user->posts as $post)
                    @foreach ($post->medias as $image)
                        <div class="col-4">
                            <img src="{{ '/storage/'.$image->media }}" alt="" class="w-100">
                        </div>
                    @endforeach
                @endforeach
                   </div>
                </div>
                {{-- likes --}}
                <div class="tab-pane fade" id="likes-tab-pane" role="tabpanel" aria-labelledby="likes-tab"
                    tabindex="0">
                    <div>
                        <livewire:like-list :user="$user">
                    </div>
                </div>
            </div>
        </div>

        <!-- right side column -->
        <div class="col-lg-4 mb-4 pr-0 mt-2">

            <!-- search box -->
            <div>
                <form class="search">
                    <div class="d-flex flex-row mb-3 w-100 bg-gray-100 align-items-center rounded-pill">
                        <span class="ms-3 border-right-0 border-0" id="basic-addon1"><img class="search-icon"
                                src="/svg/search.svg" alt="" style="width: 23px; height: 23px;"></span>
                        <input type="text" class="form-control shadow-none border-0 bg-gray-100 rounded-pill"
                            placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </form>
            </div>


            <!-- suggest follow -->
            <div class="card border-0 rounded-4 mb-3 mt-3">
                <div class="card-header   border-0 " style="font-size:1.25rem;font-weight: 700;">Who To Follow</div>
                <div class="card-body p-2 border-0" style="background-color:#f8f9fc">
                    <livewire:follow-list>
                        <div class="card-footer  border-0 text-info">Show more...</div>
                </div>
            </div>

            <!-- suggest news -->
            <div class="card border-0 rounded-4 mb-3 mt-3">
                <div class="card-header   border-0 " style="font-size:1.25rem;font-weight: 700;">Popular tags</div>
                <div class="card-body p-2 border-0" style="background-color:#f8f9fc">
                    <div>
                        <livewire:tag-list>
                    </div>
                    <div class="card-footer  border-0 text-info">Show more...</div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        coverinput.onchange = evt => {
            const [coverfile] = coverinput.files
            if (coverfile) {
                cover.src = URL.createObjectURL(coverfile)
            }
        }
    </script>
    <script>
        profileinput.onchange = evt => {
            const [profilefile] = profileinput.files

            if (profilefile) {
                profileimage.src = URL.createObjectURL(profilefile)
            }
        }
    </script>
    <script>
        window.addEventListener('close-modal', (event) => {
            let id = event.__livewire.params.id;
            $('#postModal').modal().hide();
            $(`#commentModal${id}`).modal().hide();
            $(`#reportModal${id}`).modal().hide();
            $('.modal-backdrop').hide();
        })
    </script>
    <script>
        function copyToClipboard(link) {
            console.log(link);
            event.preventDefault();
    
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(link).select();
            document.execCommand('copy');
        }
    </script>
@endsection
