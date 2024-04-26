@extends('layouts.admin')
@section('content')


<div class="content-wrapper">

   

    <form class="container-fluid d-flex flex-column align-items-center justify-content-center pt-5" action="{{route('ban-form')}}" method="POST">
        @csrf
        @method('post')
        <h1 class="text-secondary">Ban User Form</h1>
        <div style="width:500px; background-color: rgba(255,255,255,0.4);" class="border border-secondary border-3 rounded p-5">

            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="form-group">
                <label for="ban" class="text-secondary mt-3">Ban For</label>

                <input type="number" class="form-control" name="ban" id="ban" placeholder="Time/Hours">

                @if ($errors->any())
                <div class="text-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>

            <button type="submit" class="btn btn-danger text-light mx-auto mt-4 mb-2">Ban</button>


        </div>

    </form>
</div>


@endsection