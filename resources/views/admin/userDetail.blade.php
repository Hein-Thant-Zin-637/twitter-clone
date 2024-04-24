@extends('layouts.admin')
@section('content')

<h2 class="mx-auto w-50">User Detail</h2>
<div class="w-50 mx-auto border p-4">
   <!-- cover and profile photo -->
<div class="background">
    @if (!is_null(auth()->user()->cover_photo))
    <img src="{{ '/storage/'.$user->cover_photo}}" class="coverPhoto" alt="">
    @else
    <img  src="https://t4.ftcdn.net/jpg/02/40/63/55/360_F_240635575_EJifwRAbKsVTDnA3QE0bCsWG5TLhUNEZ.jpg" class="coverPhoto" alt="">
    @endif


    @if (!is_null(auth()->user()->profile))

    <img  class="profile rounded-circle" src=" {{'/storage/'.$user->profile}}" class="coverPhoto" alt="">
    @else
    <img  class="profile rounded-circle" src="profile_default_image.jpg" class="coverPhoto" alt="">
    @endif
</div>

<!-- user info -->
<div >
  
    <h4 class="pt-5 mb-0 mt-3" style="font-weight: bold;">{{$user->name}}</h4>

    <p style=" color: gray; font-size: 16px;">{{$user->user_name}}</p>
    <p class="mb-1" style=" font-size: 15px;">{{$user->bio}}</p>

    <div style="column-gap: 15px; font-size: 15px;">

        @if (!is_null($user->location))
        <p class="mb-2">Location :  {{$user->location}}</p>
        @endif

        @if (!is_null($user->dob))
        <p class="mb-2"></i> Birthday : {{$user->dob}}</p>
        @endif

        @if (!is_null($user->website))
        <p class="mb-3">Website : <a style="text-decoration: none !important;" href="{{$user->website}}" class="mb-0">{{auth()->user()->website}}</a></p>

        @endif

        <p class="mb-2">Email: {{$user->email}}</p>
        @if (!is_null($user->phone))
        <p class="mb-2">Phone : {{$user->phone}}</p>
        @endif
    </div>

   
</div>
</div>

@endsection