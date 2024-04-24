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
    <link rel="stylesheet" href="/../css/profile.css">

     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

    <nav>
        <div class="logo-name">
            <span class="logo_name ms-5" id="title">Dahsboard</span>
        </div>

        <div class="menu-items ">
            <ul class="nav-links p-3 ">
                <li><a href="{{route('dashboard')}}" class="nav-link (request()->is('admin/dashboard')) ? 'active' : '' }}">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="{{route('post-table') }}" class="nav-link {{ (request()->is('admin/post-table')) ? 'active' : '' }}">
                <i class="fa-solid fa-book"></i>
                    <span class="link-name">Post List</span>
                </a></li>
                <li><a href="{{route('report-post-table') }}" class="nav-link {{ (request()->is('admin/report-post-table')) ? 'active' : '' }}">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Post Report List</span>
                </a></li>
                <li><a href="{{route('user-table') }}" class="nav-link {{ (request()->is('admin/user-table')) ? 'active' : '' }}">
                    <i class="uil uil-user"></i>
                    <span class="link-name">User List</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Message Report List</span>
                </a></li>
              
            </ul>
            
            <ul class="logout-mode p-3">
            <li><a href="/home">
            <i class="fa-solid fa-house"></i>
                    <span class="link-name">Home</span>
                </a></li>

                <li><a href="{{route('logout')}}">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <!-- <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div> -->

            
            
            <img src="images/profile.jpg" alt="">
        </div>

        <main  class="dash-content  mt-5 p-3">
            @yield('content')
        </main>
   
    </section>
    
    <script src="/js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>