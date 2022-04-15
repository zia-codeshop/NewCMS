@extends('auth.layouts.master')

@section('content')


<!-- wrapper -->
<div class="wrapper">
    <div class="authentication-reset-password d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-lg-5">
                            <div class="card-body p-md-5">
                                <div class="text-left">
                                    <img src="assets/images/logo-img.png" width="180" alt="">
                                </div>
                                <h4 class="mt-5 font-weight-bold">{{ __('Reset Password') }}</h4>
                                <p class="text-muted">We received your reset password request. Please enter your new password!</p>

                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">{{session('success')}}
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

                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <input type="hidden" name="email" value="{{ $email }}">

                                    <div class="form-group mt-5">

                                        <label>{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                    </div>

                                    <div class="form-group">

                                        <label>{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password') }}</button>

                                </form>

                                <a href="{{ route('login') }}" class="btn btn-link btn-block"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>

                            </div>
                        </div>
                        <div class="col-lg-7">
                            <img src="{{ asset('admin/images/login-images/reset_password.png') }}" class="card-img h-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->

@endsection
