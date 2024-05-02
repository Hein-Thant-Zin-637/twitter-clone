@extends('layouts.app')
@section('content')
    @include('livewire.modal')
    <livewire:setting>
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