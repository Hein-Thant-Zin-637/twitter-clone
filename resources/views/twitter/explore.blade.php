@extends('layouts.app')
@section('content')
    @include('livewire.modal')
    <div class="row w-100 v-body">
        <div class="col-lg-8 col-md-12 border-end px-1">
            <div class="row w-100  sticky-top bg-white  mb-3" style="margin-left :0.3px;">
                <div class="sticky-top" style="top:-470px;z-index: 999;">
                    <livewire:search>
                </div>
            </div>
        </div>
            <div class="col-lg-4 mb-4 pr-0 mt-2">
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
