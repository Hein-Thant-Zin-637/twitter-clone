<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/f1dd83d39c.js" crossorigin="anonymous"></script>
    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="/css/style.css">

    {{-- emoji css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.css">

    <!----======== profile ======== -->
    <link rel="stylesheet" href="/css/profile.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/f1dd83d39c.js" crossorigin="anonymous"></script>

    {{-- twitter --}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <link rel="shortcut icon" href="https://img.merchantface.com/site/favicon.ico">

    <link rel="stylesheet" href="/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/css/viewer.min.css">
    <link rel="stylesheet" href="/css/bootstrap-msg.css">
    <link rel="stylesheet" href="/css/site.css">
    <link rel="stylesheet" href="/css/profile.css">

    <script src="/js/jquery-1.11.3.min.js.download"></script>
    <script src="/js/bootstrap.min.js.download"></script>
    <script src="/js/jquery.easing.js.download"></script>
    <script src="/js/theme.js.download"></script>
    <script src="/js/viewer-jquery.min.js.download"></script>
    <script src="/js/bootstrap-msg.js.download"></script>

    <script src="./js/bootbox.min.js.download"></script>
    <style type="text/css">
        body,
        body.swal2-shown,
        body.modal-open {
            overflow: inherit;
            padding-right: inherit !important;
        }
    </style>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @livewireStyles
    


</head>

<body id="page-body" style="padding: 0px !important; overflow-y: scroll !important;" class="container-fluid">
    <div id="wrapper" class="ps-md-5 pe-0 p-0  w-100 ">
        <nav class="navbar fixed-bottom  align-items-start sidebar border-right d-none d-sm-block  accordion  p-0  topbar sticky-top"
            id="main-left-nav">
            <div class=" mt-2">
                <img src="/svg/twitter.svg" alt="twitter" style="width: 50px; height:30px; ">
            </div>
            <div class=" d-flex flex-column p-0">
                <ul class="nav navbar-nav text-black ms-2 mt-3 d-flex flex-column" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link p-0 w-auto h-auto" href="{{route('home')}}">
                            <div class="d-flex justify-content-start align-items-center gap-2 w-auto rounded-pill"
                                style="padding: 0.6rem">
                                <object data="{{ Route::is('home')  ? '/svg/home_active.svg' : '/svg/home.svg' }}" width="30" height="30">
                                </object><span>&nbsp;Home</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 w-auto h-auto" href="{{ route('explore') }}">
                            <div class="d-flex justify-content-start align-items-center gap-2 w-auto rounded-pill"
                                style="padding: 0.6rem">
                                <object data="{{ Route::is('explore')  ? '/svg/search_active.svg' : '/svg/search.svg' }}" width="30" height="30">
                                </object><span>&nbsp;Explore</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 w-auto h-auto" href="{{ route('notification') }}">
                            <div class="d-flex justify-content-start align-items-center gap-2 w-auto rounded-pill"
                                style="padding: 0.6rem">
                                <span class="position-relative">
                                    <object data="{{ Route::is('notification')  ? '/svg/notification_active.svg' : '/svg/notification.svg' }}" width="30" height="30"></object>
                                    @if(auth()->user()->hasNotification()->count() > 0)
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{auth()->user()->hasNotification()->count()}}</span>
                                    @endif
                                </span>
                                </object><span>&nbsp;Notification</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 w-auto h-auto" href="{{ route('bookmark') }}">
                            <div class="d-flex justify-content-start align-items-center gap-2 w-auto rounded-pill"
                                style="padding: 0.6rem">
                                <object data="{{ Route::is('bookmark')  ? '/svg/bookmark_active.svg' : '/svg/bookmark.svg' }}" width="30" height="30">
                                </object><span>&nbsp;Bookmark</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 w-auto h-auto" href="{{ route('chat') }}">
                            <div class="d-flex justify-content-start align-items-center gap-2 w-auto rounded-pill"
                                style="padding: 0.6rem">
                                <object data="{{ Route::is('chat')  ? '/svg/message_active.svg' : '/svg/message.svg' }}" width="28" height="28">
                                </object><span>&nbsp;Message</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 w-auto h-auto" href="{{ route('profile',auth()->user()->user_name) }}">
                            <div class="d-flex justify-content-start align-items-center  gap-2 w-auto rounded-pill"
                                style="padding: 0.6rem">
                                <object data="{{ Route::is('profile')  ? '/svg/profile_active.svg' : '/svg/profile.svg' }}"  width="30" height="30">
                                </object><span>&nbsp;Profile</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 w-auto h-auto" href="{{ route('setting') }}">
                            <div class="d-flex justify-content-start align-items-center gap-2 w-auto rounded-pill"
                                style="padding: 0.6rem">
                                <object data="{{ Route::is('setting')  ? '/svg/settings_active.svg' : '/svg/setting.svg' }}" width="30" height="30">
                                </object><span>&nbsp;Setting</span>
                            </div>
                        </a>
                    </li>
                    @if(auth()->user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link p-0 w-auto h-auto" href="{{ route('dashboard') }}">
                                <div class="d-flex justify-content-start align-items-center gap-2 w-auto rounded-pill"
                                    style="padding: 0.6rem">
                                    </object><span>&nbsp;Admin Pannel</span>
                                </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="d-block d-lg-none">
                <button class="ms-3 btn btn-primary rounded-circle p-2 text-white"><img src="/svg/feather.svg"
                        alt="" style="width: 30px; height: 30px; color:white !important;"></button>
            </div>
            <div class="d-none d-lg-block">
                <button class="ms-3 btn btn-primary rounded-pill w-75 p-2 fs-5 font-weight-bold"
                    data-bs-toggle="modal" data-bs-target="#postModal">Post</button>
            </div>
            <div class="d-block d-lg-none ms-5 mb-3 fixed-bottom">
                <img src="/img/avatar2.jpeg" alt="" class="rounded-pill" style="width: 50px; height: 50px;">
            </div>
            <div class=" d-none d-lg-block fixed-bottom  mb-3" style="width: 200px">
                <div class="f-none d-md-block dropup-center dropup" style="width: 200px">
                    <div class="w-100 d-flex justify-content-start align-items-center gap-2 w-auto rounded-pill"
                        style="padding: 0.6rem">
                        <div class="d-flex flex-row gap-3">
                            <div>
                                
                                <img src=" {{auth()->user()->profile ??'/profile_default_image.jpg'}}"
                                    alt="" class="rounded-circle" style="width: 50px; height: 50px;">
                            </div>
                            <div class="rounded-pill d-flex  flex-column">
                                <a href="#"
                                    class="fs-5 font-weight-bold text-decoration-none text-dark">{{ auth()->user()->name }}</a>
                                <p class="m-0 text-muted">{{ auth()->user()->user_name }}</p>
                            </div>
                        </div>
                        <span type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg viewBox="0 0 24 24" aria-hidden="true" class="blue ms-3"
                                style="height:1.25rem;width:1.25rem; line-height: 1.65em; cursor: pointer;">
                                <g>
                                    <circle cx="5" cy="12" r="2"></circle>
                                    <circle cx="12" cy="12" r="2"></circle>
                                    <circle cx="19" cy="12" r="2"></circle>
                                </g>
                            </svg>
                        </span>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('addaccount') }}">add account</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">logout
                                    {{ auth()->user()->user_name }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <main role="main" class="container-fluid bg-white p-0 ms-3 w-100">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    {{-- jquery link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{-- emoji section script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.js"></script>
    @livewireScripts

    {{-- javascript for emoji picker --}}
    <script>
        $("#emoji_picker").emojioneArea()
    </script>

    @yield('script')

</body>

</html>
