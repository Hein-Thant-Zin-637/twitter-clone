@extends('layouts.admin')
@section('content')

@if(session('message'))
<div class="alert alert-default-info">
    {{ session('message') }}
</div>
@endif

<h1 class="display-5">Post Detail</h1>


<div >
    <li class="list-group-items m-3 p-3 card">
        <article href="/qiongliwu/posts/27294">
            {{-- head --}}
            <div class="d-inline-flex" style="width:100%">
                <a href="#">
                    <div class="info_author_photo px-4 pt-2">
                       
                        <img src=" {{$post->user->profile ? '/storage/'.$post->user->profile : '/../profile_default_image.jpg'}}" alt="..."
                            style="width:3rem;height:3rem" class="mr-3 rounded-circle">
                    </div>
                </a>
                <div class="flex-fill pt-2">
                    <div class="d-flex">
                        <div class="d-flex info_author">
                            <div style="align-items: center;">
                                <div class="d-flex flex-row gap-1 mt-2">
                                    <a href="#"class="text-a">
                                        <div style="line-height:100%">
                                            <span class="v-text-s">{{ $post->user->name }}</span>
                                        </div>
                                    </a>
                                    <div class="pl-2 text-m">
                                        <span class="text-to">{{ $post->user->user_name }}</span>
                                    </div>
                                    <div class="pl-2">
                                        <p class="text-muted">{{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    {{-- description --}}
                    <div class="info-intro">{{ $post->description }}</div>
                    {{-- image --}}
                    <div class="row w-100 mt-3">
                        @foreach ($post->medias as $image)
                            @if ($loop->index > 3)
                            @break
                        @endif
                        <div class="<?php if (count($post->medias) == 1) {
                            echo 'col-12';
                        } elseif (count($post->medias) == 3) {
                            echo 'col-4';
                        } else {
                            echo 'col-6';
                        } ?> p-0">
                            <img src="{{ asset($image->media) }}" alt="" style="width: 100%; height: auto;">
                        </div>
                    @endforeach
                </div>
                {{-- footer --}}
               
            </div>
        </div>
    </article>
</li>

</div>


<div class="d-flex justify-content-between p-3">
    <div>
        <form method="POST" action="{{ url("/admin/delete-post/$post->id") }}" class="m-0 d-flex border border-radius border-warning p-4">
            @csrf
            @method('DELETE')


            <select class="form-select" id="message" name="message" aria-label="Default select example">
                <option  disabled>Open this select menu</option>
                <option name="message" value="Deleting for cringe">Deleting for cringe</option>
                <option name="message" value="Deleting for span">Deleting for send nude</option>
                <option name="message" value="Deleting for send nude">Deleting for send nude</option>
            </select>

            <button class="btn btn-warning" style="height: 34px; margin:0 10px;">Delete</button>
        </form>
    </div>
</div>

@endsection