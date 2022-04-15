@extends('auth.layouts.master')

@section('content')

<!-- wrapper -->
<div class="wrapper">
    <div class="section-authentication">
        <div class="container-fluid">
            <div class="card mb-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-12 col-lg-5 col-xl-4 d-flex align-items-stretch">
                            <div class="card mb-0 shadow-none bg-transparent w-100 login-card rounded-0">
                                <div class="card-body p-md-5">
                                    <img src="{{ asset('admin/images/logo-img.png') }}" width="180" alt="" />
                                    <h4 class="mt-5"><strong>{{ __('Register') }}</strong></h4>
                                    <p>Register by entering the informations below</p>

                                    @if(session('success') || session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }} {{ session('status') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{session('error')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group mt-4">

                                            <label>{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>

                                        <div class="form-group">

                                            <label>{{ __('Name') }}</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                        </div>

                                        <div class="form-group">

                                            <label>{{ __('Password') }}</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input id="password" type="password" value="{{ old('password') }}" class="form-control border-right-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                <div class="input-group-append">
                                                    <a href="javaScript:;" class="input-group-text bg-transparent border-left-0"><i class='bx bx-hide'></i></a>
                                                </div>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <label>{{ __('Confirm Password') }}</label>
                                            <div class="input-group" id="show_hide_password_1">

                                                <input id="password-confirm" type="password" class="form-control border-right-0" name="password_confirmation" required autocomplete="new-password">

                                                <div class="input-group-append">
                                                    <a href="javaScript:;" class="input-group-text bg-transparent border-left-0"><i class='bx bx-hide'></i></a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">I read and agree to Terms & Conditions</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block mt-4"><i class='bx bxs-lock mr-1'></i>{{ __('Register') }}</button>

                                    </form>

                                    <div class="text-center mt-4">
                                        <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Login</a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 col-xl-8 d-flex align-items-stretch">
                            <div class="card mb-0 shadow-none bg-transparent w-100 rounded-0">
                                <div class="card-body p-md-5"></div>
                                <img src="{{ asset('admin/images/login-images/auth-img-register2.png') }}" class="card-img-top" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent px-md-5">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">Register With</li>
                            <li class="list-inline-item"><a href="javaScript:;"><i class='bx bxl-facebook mr-1'></i>Facebook</a>
                            </li>
                            <li class="list-inline-item"><a href="javaScript:;"><i class='bx bxl-twitter mr-1'></i>Twitter</a>
                            </li>
                            <li class="list-inline-item"><a href="javaScript:;"><i class='bx bxl-google mr-1'></i>Google</a>
                            </li>
                        </ul>

                        @include('auth.layouts._developedBy')

                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="javaScript:;">Privacy Policy</a>
                            </li>
                            <li class="list-inline-item"><a href="javaScript:;">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->

@endsection

@section('script')

<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });

        $("#show_hide_password_1 a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password_1 input').attr("type") == "text") {
                $('#show_hide_password_1 input').attr('type', 'password');
                $('#show_hide_password_1 i').addClass("bx-hide");
                $('#show_hide_password_1 i').removeClass("bx-show");
            } else if ($('#show_hide_password_1 input').attr("type") == "password") {
                $('#show_hide_password_1 input').attr('type', 'text');
                $('#show_hide_password_1 i').removeClass("bx-hide");
                $('#show_hide_password_1 i').addClass("bx-show");
            }
        });
    });
</script>

@endsection
