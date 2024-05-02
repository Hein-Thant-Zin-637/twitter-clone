@extends('layouts.app')
@section('content')
<div class="row w-100 v-body">
    <div class="col-lg-4 border-end p-0 vh-100">
        <div class="d-flex justify-content-between">
            <div>
                <h4>Messages</h4>
            </div>
            <div class="d-flex">
                <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#">
                    <i class="fa-solid fa-gear"></i>
                </button>
                <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="mt-4 container m-0 p-0">
            @if ($conversation)
            @foreach ($chatArray as $chatz)
                @if ($chatz->user_one == auth()->user()->id || $chatz->user_two == auth()->user()->id)
                @php
                    $reciever = $chatz->user_one == auth()->user()->id ? $chatz->userTwo : $chatz->userOne;
                @endphp
                <div class="d-flex justify-content-between">
                    <a class="d-flex justify-content-between ms-0 text-decoration-none" href="/chat/conversation/{{ $chatz->id }}/{{ $reciever }}">
                        @csrf
                        <button class="text-left d-flex flex-row gap-3 border-0 fs-5 p-2" style="width: 300px !important; background-color: white;" type="submit">
                            <img class="rounded-circle small-profile" src="{{ $reciever->profile ? '/storage/'.$reciever->profile : '/profile_default_image.jpg'}}" alt="photo">
                            <div class="d-flex " style="flex-direction: column">
                                <p class="m-0">{{ $reciever->name }} </p>
                                <small class="fw-light fs-6"> @ {{ $reciever->user_name }}</small>
                            </div>
                        </button>
                    </a>
    
                    <div class="dropdown chat-select-menu">
                        <button class="btn btn-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <form method="POST" action="{{ route('deleteConversation', $chatz->id) }}">
                                @csrf
                                @method('delete')
                                <li><button type="submit" class="dropdown-item text-danger" href="#">Delete Conversation</button></li>
                            </form>
                        </ul>
                    </div>
                </div>
                @endif

            @endforeach
        @else
            <b class="h1">Welcome to your inbox!</b>
            <p>Drop a line, share posts and more with private conversations between you and others on X.</p>
            <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Write a message
            </button>
        @endif
        </div>
    </div>

</div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New Message</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            @foreach ($users as $user)
                @if ($user->id == $id)
                    @continue
                @endif
                @if($user->hasChat($user->id))
                    @continue
                @else
                <form class="d-flex justify-content-between border p-2" method="POST" action="{{ route('conversation', $user->id) }}">
                    @csrf
                    <div>
                        <img class="rounded-circle small-profile" src="https://static.wikia.nocookie.net/aesthetics/images/a/a3/Pure_blue.png/revision/latest/thumbnail/width/360/height/450?cb=20210323184329" alt="photo">
                        {{ $user->name }}
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary rounded-pill">Chat</button>
                </form>
                @endif

            @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection