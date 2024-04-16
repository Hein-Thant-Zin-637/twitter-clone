@extends('layouts.index')
@section('content')
    <!-- Modal -->
    <div class="modal" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-2">
                <a href="{{ route('welcome') }}" type="button" class="btn-close shadow-none"></a>
                <div class="modal-body">
                    <form action="{{ route('singup', $step) }}" method="POST">
                        @csrf
                        @if ($step == 'data')
                            <div class="text-center">
                                <img src="/svg/twitter.svg" alt="" style=" width: 30px; height: 30px;">
                            </div>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control shadow-none @error('name') is-invalid @enderror"
                                    id="name" placeholder="Name" name="name" value="{{ old('name') }}">
                                <label for="name">Name</label>
                                @error('name')
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-3 mt-3" id="email">
                                <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror "
                                    placeholder="Email" name="email" value="{{ old('email') }}">
                                <label for="email">Email</label>
                                @error('email')
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                @enderror
                            </div>
                            <div class="form-floating mb-3 mt-3" id="phone" style="display: none;">
                                <input type="number" class="form-control shadow-none @error('phone') is-invalid @enderror"
                                    placeholder="Phone" name="phone" value="{{ old('name') }}">
                                <label for="phone">phone</label>
                                @error('phone')
                                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                                @enderror
                            </div>
                            <div class="float-end text-info">
                                <span onclick="phone()" id="showemail" style=" cursor: pointer;">Use phone
                                    instead</span>
                                <span onclick="email()" id="showphone" style=" display: none; cursor: pointer;">Use email
                                    instead</span>
                            </div>
                            <div class="mb-3 mt-5">
                                <h6 style="font-weight: bold;">Date Of Birth</h6>
                                <p>This will not be shown publicly. Confirm your own age, even if this account is for a
                                    business, a pet, or something else.</p>
                            </div>
                            <div class="row w-100 mb-3 mt-3">
                                <div class="form-floating col-5">
                                    <select class="form-select shadow-none " name="month">
                                        <option value="none" disabled selected></option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <label for="month" style="margin-left: 10px;">Month</label>
                                </div>
                                <div class="form-floating col-3">
                                    <select class="form-select shadow-none" name="day">
                                        <option value="none" disabled selected></option>
                                        @for ($i = 1; $i < 31; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <label for="day" style="margin-left: 10px;">Day</label>
                                </div>
                                <div class="form-floating col-4">
                                    <select class="form-select shadow-none" name="year">
                                        <option value="none" disabled selected></option>
                                        <?php $date = date('Y'); ?>
                                        @for ($i = $date; $i >= 1904; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <label for="year " style="margin-left: 10px;">Year</label>
                                </div>
                                @error('dob')
                                    <small class="text-danger">{{ $errors->first('dob') }}</small>
                                @enderror
                            </div>
                        @elseif ($step == 'password')
                            <div style="margin-bottom: 230px;">
                                <h3 class="font-weight-bold">You'll need a password</h3>
                                <p class="mb-3">make sure it's 8 characters or more</p>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="password"
                                        class="form-control shadow-none @error('password') is-invalid @enderror"
                                        id="password" placeholder="Password" name="password">
                                    <label for="password">Password</label>
                                    @error('password')
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                    @enderror
                                </div>
                                <div>
                                    <input type="hidden" name="name" value="{{ old('name') }}">
                                    <input type="hidden" name="email" value="{{ old('email') }}">
                                    <input type="hidden" name="phone" value="{{ old('phone') }}">
                                    <input type="hidden" name="dob"
                                        value="{{ old('year') . '-' . old('month') . '-' . old('day') }}">
                                </div>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-secondary rounded-pill w-100 my-3">Next</button>
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
    <script>
        function email() {
            document.getElementById("email").style.display = "block";
            document.getElementById("showemail").style.display = "block";
            document.getElementById("phone").style.display = "none";
            document.getElementById("showphone").style.display = "none";
        }

        function phone() {
            document.getElementById("email").style.display = "none";
            document.getElementById("showemail").style.display = "none";
            document.getElementById("phone").style.display = "block";
            document.getElementById("showphone").style.display = "block";
        }
    </script>
@endsection
