<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/welcome.css">

</head>

<body>

    




    <div class="row w-100">
        <div class="col-12 col-lg-6 p-5 d-lg-flex justify-content-center align-items-center">
            <img src="/svg/twitter.svg" alt="" class="twitter-logo">
        </div>
        <div class="col-12 col-lg-6 ps-5 mt-3">
            <div class="container d-flex flex-column justify-content-left ">
                <h1 class="h1 font-weight-bold mb-5 " style="font-size: 55px">Happening now</h1>
                <h3 class="font-weight-bold my-3 float-left">Join today</h3>
                <button
                    class="mb-3 mt-3 d-flex flex-row justify-content-center align-items-center gap-3 w-50  border-1 border-gray-200 rounded-pill bg-white p-1">
                    <img src="/svg/google.svg" alt="" style="width: 30px; height: 30px;">
                    <span>Sign up with Google</span>
                </button>
                <button
                    class=" mb-3 d-flex flex-row justify-content-center align-items-center gap-3 w-50 border-1 border-gray-200 rounded-pill bg-white p-1">
                    <img src="/svg/apple.svg" alt="" style="width: 30px; height: 30px;">
                    <span>Sign up with Apple</span>
                </button>
                <div class="login-box mb-3 w-50">
                    <hr>
                    <span>or</span>
                </div>
                <a href="{{ route('singup',['step' => 'data']) }}" class=" btn btn-primary font-weight-bold p-2 w-50 rounded-pill">
                    <span style="font-weight:bold;">Create account</span>
                </a>
                <div class="w-50">
                    <small>By signing up, you agree to the <span class="text-info">Terms of Service</span> and <span
                            class="text-info">Privacy Policy</span>, including <span class="text-info">Cookie
                            Use</span>.</small>
                </div>
                <h4 class="h4 font-weight-bold mt-5 mb-3">Already have anaccount?</h4>
                <a href="{{ route('singin',['step' => 'data']) }}"
                    class="mb-3 btn border border-gray-200 text-primary font-weight-bold text-center w-50 rounded-pill p-2">
                    <span style="font-weight:bold; text-decoration: none;">Sign in</span>
                </a>
            </div>
        </div>
    </div>

    <main>
        @yield('content')
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    @if(isset($_SESSION['ban']))
    <div class="modal" id="register" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title text-danger">!!!!!!!!</h2>
       
      
      </div>
      <div class="modal-body">
      <p class="text-danger">{{ $_SESSION['ban'] }}</p>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>

    <script type="text/javascript">
        $(window).on('load', function() {
            $('#register').modal('show');
        });

        
        function close(){
            $('#register').modal('hide');
        }
    </script>
  @php
 session_destroy(); 
  @endphp
    @endif
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('script')

</body>

</html>
