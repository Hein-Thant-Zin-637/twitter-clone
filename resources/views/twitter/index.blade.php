@extends('layouts.app')
@section('content')
    @include('livewire.modal')

    <div class="row w-100 v-body">
        <div class="col-lg-8 col-md-12 border-end px-1">
            <div class="row w-100  sticky-top text-bg-light  mb-3" style="margin-left :0.3px;">
                <ul class="nav bg-white p-1" id="pills-tab" role="tablist">
                    <li class="nav-item col-6 w-100 p-2 d-flex justify-content-center" role="presentation">
                        <button class="nav-link text-center fs-5 px-3 text-dark p-0 active" id="pills-home-tab"
                            data-bs-toggle="pill" data-bs-target="#for-you" type="button" role="tab"
                            aria-controls="pills-home" aria-selected="true">For you</button>
                    </li>
                    <li class="nav-item col-6 w-100 p-2 d-flex justify-content-center" role="presentation">
                        <button class="nav-link text-center fs-5  text-dark p-0" id="pills-profile-tab"
                            data-bs-toggle="pill" data-bs-target="#following" type="button" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Following</button>
                    </li>
                </ul>
            </div>
            <div class="m-2">
                <livewire:new-post>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="for-you" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="info-list">
                        <ul class="list-group">
                            <livewire:foryou-post>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade " id="following" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <div class="info-list">
                        <ul class="list-group">
                            <livewire:following-post>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4 pr-0 mt-2">
            <div class="sticky-top" style="top:-470px;z-index: 999;">
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
                <div class="bg-gray-100 p-3 rounded-4">
                    <h3>Subscribe to Premium</h3>
                    <p> Subscribe to unlock new features and, if eligible, receive a share of ads revenue.</p>
                    <button class="btn btn-dark rounded-pill font-weight-bold">Subscribe</button>
                </div>
                {{-- tag --}}
                <div class="card border-0 rounded-4 mb-3 mt-3">
                    <div class="card-header   border-0 " style="font-size:1.25rem;font-weight: 700;">Popular tags</div>
                    <div class="card-body p-2 border-0" style="background-color:#f8f9fc">
                        <div>
                            <livewire:tag-list>
                        </div>
                        <div class="card-footer  border-0 text-info">Show more...</div>
                    </div>

                </div>
                {{-- follow --}}
                <div class="card border-0 rounded-4 mb-3 mt-3">
                    <div class="card-header   border-0 " style="font-size:1.25rem;font-weight: 700;">Who To Follow</div>
                    <div class="card-body p-2 border-0" style="background-color:#f8f9fc">
                        <livewire:follow-list>
                            <div class="card-footer  border-0 text-info">Show more...</div>
                    </div>
                </div>
                <small>Terms of Service
                    Privacy Policy
                    Cookie Policy
                    Accessibility
                    Ads info
                    More
                    © 2024 X Corp.
                    Site Malicious Rat</small>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('close-modal',(event) => {
            let id = event.__livewire.params.id;
            $('#postModal').modal().hide();
            $(`#commentModal${id}`).modal().hide();
            $(`#reportModal${id}`).modal().hide();
            $('.modal-backdrop').hide();
        })
    </script>
@endsection
