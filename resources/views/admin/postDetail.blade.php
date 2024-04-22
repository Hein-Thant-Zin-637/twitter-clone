@extends('layouts.admin')
@section('content')

@if(session('message'))
<div class="alert alert-default-info">
    {{ session('message') }}
</div>
@endif

<h1 class="display-5">Post Detail</h1>

<article class="border border-radius p-3" href="/../qiongliwu/posts/27294">
    {{-- head --}}
    <div class="d-inline-flex" style="width:100%">
        <a href="#">
            <div class="info_author_photo pl-2 pt-2">
                <img src="../../img/459510ae-8588-4e0b-8a23-01da7aa31d1f.jpg" alt="..." style="width:3rem;height:3rem" class="mr-3 rounded-circle">
            </div>
        </a>
        <div class="flex-fill p-4">
            <div class="d-flex">
                <div class="d-flex info_author">
                    <div>
                        <div class="d-flex">
                            <a href="#" class="text-a">
                                <div style="line-height:100%">
                                    <span class="v-text-s">Ms. Qiongli Wu</span>
                                </div>
                            </a>
                            <div class="pl-2 text-m">
                                <span class="text-to">@qiongliwu</span>
                            </div>
                        </div>
                    </div>
                    <div class="pl-2">
                        <p class="text-muted">26 minutes ago</p>
                    </div>
                </div>


            </div>
            {{-- description --}}
            <div class="info-intro">
                <span class="text-success">#sell</span>
                SupBro new hot selling productsSports shoes waterproof
                protection cleaner,Place of Origin:Guangdong, China Cases of
                gauge:24 bottles Brand Name:SupBro Product features:waterproof
                Product specification:150ml,300ml Model Number:Nano...
            </div>
            {{-- image --}}

            <div class="row w-100">
                <div class="col-6 p-0">
                    <img src="../../img/1b4c349b-0d3c-4611-8cd1-f810d735bbad.jpg" alt="" style="width: 100%; height: auto;">
                </div>
                <div class="col-6 p-0">
                    <img src="../../img/1b4c349b-0d3c-4611-8cd1-f810d735bbad.jpg" alt="" style="width: 100%; height: auto;">
                </div>
            </div>
            {{-- footer --}}

        </div>


    </div>
</article>

<div class="d-flex justify-content-between p-3">
    <div>
        <form method="POST" action="{{ url("/admin/delete-post/$post->id") }}" class="m-0 d-flex border border-radius border-warning p-4">
            @csrf
            @method('DELETE')


            <select class="form-select" id="message" name="message" aria-label="Default select example">
                <option  selected>Open this select menu</option>
                <option name="message" value="Deleting for cringe">Deleting for cringe</option>
                <option name="message" value="2">Two</option>
                <option name="message" value="3">Three</option>
            </select>

            <button class="btn btn-warning" style="height: 34px; margin:0 10px;">Delete</button>
        </form>
    </div>
</div>

@endsection