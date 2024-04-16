@extends('layouts.index')
@section('content')
    <!-- Modal -->
    <div class="modal" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-2">
                <a href="{{ route('welcome') }}" type="button" class="btn-close shadow-none"></a>
                <div class="text-center">
                    <img src="/svg/twitter.svg" alt="" style=" width: 30px; height: 30px;">
                </div>
                <div class="modal-body">
                    <form action="{{ route('singin', $step) }}" method="POST">
                        @csrf
                        @if ($step == 'data')
                            <div class="my-3 mb-4">
                                <h3 style="font-weight: bold">Sign in to X</h3>
                            </div>
                            <button
                                class="mb-3 mt-3 d-flex flex-row justify-content-center align-items-center gap-3 w-100  border-1 border-gray-200 rounded-pill bg-white p-1">
                                <img src="/svg/google.svg" alt="" style="width: 30px; height: 30px;">
                                <span>Sign up with Google</span>
                            </button>
                            <button
                                class=" mb-3 d-flex flex-row justify-content-center align-items-center gap-3 w-100 border-1 border-gray-200 rounded-pill bg-white p-1">
                                <img src="/svg/apple.svg" alt="" style="width: 30px; height: 30px;">
                                <span>Sign up with Apple</span>
                            </button>
                            <div class="login-box mb-3 w-100">
                                <hr>
                                <span>or</span>
                            </div>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control shadow-none @error('type') is-invalid @enderror"
                                    id="type" placeholder="Phone, email, or username" name="type">
                                <label for="type">Phone, email, or username</label>
                                @error('type')
                                    <small class="text-danger">{{ $errors->first('type') }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-dark rounded-pill w-100">Next</button>
                            </div>
                            <div class="mb-3">
                                <a href="#" class="btn border border-gray-200 rounded-pill w-100 " style="font-weight: bold">Forgot password?</a>
                            </div>
                            <div>
                                <span>Dont't have an account?<a href="#" class="text-info text-decoration-none">Sign up</a></span>
                            </div>
                        @elseif ($step == 'password')
                        
                            <div style="margin-bottom: 230px;">
                                <div class="my-3 mb-4">
                                    <h3 style="font-weight: bold">Enter Your Password</h3>
                                </div>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="password"
                                        class="form-control shadow-none @error('password') is-invalid @enderror"
                                        id="password" placeholder="Password" name="password">
                                    <label for="password">Password</label>
                                    @error('password')
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <?php $type =session('type') ; ?>
                                <input type="hidden" name="type" value="{{$type}}">
                                <input type="hidden" name="{{$type}}" value="{{session("$type")}}">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-dark rounded-pill w-100">Login</button>
                            </div>
                            <div>
                                <span>Dont't have an account?<a href="#" class="text-info text-decoration-none">Sign up</a></span>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#register').modal('show');
        });
    </script>
@endsection
