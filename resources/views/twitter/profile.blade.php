@extends('layouts.app')
@section('content')
@include('livewire.modal')

<div class="row w-100 v-body">

    <!-- middle column -->
    <div class="col-lg-7 container" style="padding-left: 15px;">
        <!-- back arrow button -->
        <a href="/home" class="d-block"><i class="fa-solid fa-arrow-left"></i></a>

        <!-- cover and profile photo -->
        <div class="background">
            @if (!is_null(auth()->user()->cover_photo))
            <img src="{{ '/storage/'.auth()->user()->cover_photo}}" class="coverPhoto" alt="">
            @else
            <img  src="https://t4.ftcdn.net/jpg/02/40/63/55/360_F_240635575_EJifwRAbKsVTDnA3QE0bCsWG5TLhUNEZ.jpg" class="coverPhoto" alt="">
            @endif


            @if (!is_null(auth()->user()->profile))

            <img  class="profile rounded-circle" src=" {{'/storage/'.auth()->user()->profile}}" class="coverPhoto" alt="">
            @else
            <img  class="profile rounded-circle" src="profile_default_image.jpg" class="coverPhoto" alt="">
            @endif
        </div>

        <!-- user info -->
        <div>
            <div class="d-flex justify-content-between">
                <h4 class="pt-5 mb-0 mt-3" style="font-weight: bold;">{{auth()->user()->name}}</h4>

                <div class="mt-3">
                    <!-- <a href="" class="btn btn-primary mt-5">Edit Profile</a> -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Edit Profile
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="myform" action="{{route('update-profile')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')


                                        <div class="form-group background">

                                         
                                                <img id="cover" src="{{ auth()->user()->cover_photo ? '/storage/'.auth()->user()->cover_photo : 'https://t4.ftcdn.net/jpg/02/40/63/55/360_F_240635575_EJifwRAbKsVTDnA3QE0bCsWG5TLhUNEZ.jpg'}}" class="coverPhoto" alt="">
                                           
                                            <label for="coverinput" class="fs-5 btn btn-light opacity-25 editCover"><i class="fa-solid fa-image"></i></label>
                                            <input type="file" id="coverinput" name="cover" hidden>



                                          

                                            <img id="profileimage" class="profile rounded-circle" src=" {{auth()->user()->profile ? '/storage/'.auth()->user()->profile : 'profile_default_image.jpg'}}" class="coverPhoto" alt="">
                                           
                                            <label for="profileinput" class="fs-5 btn btn-light opacity-25 editProfile"><i class="fa-solid fa-image"></i></label>
                                            <input value="ok" type="file" id="profileinput" name="profile" hidden>

                                        </div>

                                        <div class="form-group mt-5">
                                            <label for="name" class="text-primary mt-5">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{auth()->user()->name}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="bio" class="text-primary mt-3">Bio</label>
                                            <textarea class="form-control" id="bio" name="bio" rows="3">{{auth()->user()->bio}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="location" class="text-primary mt-3">Location</label>
                                            <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="{{auth()->user()->location}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="website" class="text-primary mt-3">Website</label>
                                            <input type="text" class="form-control" name="website" id="website" placeholder="Website" value="{{auth()->user()->website}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="phone" class="text-primary mt-3">Phone</label>
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{auth()->user()->phone}}">
                                        </div>

                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" form="myform" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <p style=" color: gray; font-size: 16px;">{{auth()->user()->user_name}}</p>
            <p class="mb-1" style=" font-size: 15px;">{{auth()->user()->bio}}</p>

            <div class="d-flex" style="column-gap: 15px; color: gray; font-size: 15px;">

                @if (!is_null(auth()->user()->location))
                <p class="mb-2"><i class="fa-solid fa-location-dot"></i> {{auth()->user()->location}}</p>
                @endif

                @if (!is_null(auth()->user()->dob))
                <p class="mb-2"><i class="fa-solid fa-cake-candles"></i> {{auth()->user()->dob}}</p>
                @endif

                @if (!is_null(auth()->user()->website))
                <p class="mb-3"><i class="fa-solid fa-link"></i> <a style="text-decoration: none !important;" href="{{auth()->user()->website}}" class="mb-0">{{auth()->user()->website}}</a></p>

                @endif

                @if (!is_null(auth()->user()->phone))
                
                <p class="mb-2"><i class="fa-solid fa-phone"></i> 0{{auth()->user()->phone}}</p>
                @endif
            </div>

            <p style=" color: gray; font-size: 15px;"> - following - followers</p>

        </div>

        <!-- tab -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#tweet">Tweets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#t&r">Tweets and replies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Media</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Likes</a>
            </li>
        </ul>

        <!-- Tweet -->
        <div id="tweet">
            hello
        </div>

        <!-- Tweet and replies -->
        <div id="t&r">
            i am t
        </div>
    </div>

    <!-- right side column -->
    <div class="col-lg-5 container">

        <!-- search box -->
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>


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
@endsection