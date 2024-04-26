@extends('layouts.app')
@section('content')
    @include('livewire.modal')
    <div class="row w-100 v-body">
        <div class="col-lg-8 col-md-12 border-end px-1">
            <div class="row w-100  sticky-top bg-white  mb-3" style="margin-left :0.3px;">
                <h3 class="m-0 mt-3">Notification</h3>
            </div>
            <div style="display: flex; flex-direction: column;" class="d-flex w-100 gap-3">
                <livewire:notification-list>
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
        window.addEventListener('close-modal', (event) => {
            let id = event.__livewire.params.id;
            $('#postModal').modal().hide();
            $(`#commentModal${id}`).modal().hide();
            $(`#reportModal${id}`).modal().hide();
            $('.modal-backdrop').hide();
        })
    </script>
@endsection
