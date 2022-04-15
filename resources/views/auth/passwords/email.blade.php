@extends('auth.layouts.master')

@section('content')

<!-- wrapper -->
<div class="wrapper">
    <div class="authentication-forgot d-flex align-items-center justify-content-center">
        <div class="card shadow-lg forgot-box">
            <div class="card-body p-md-5">
                <div class="text-center">
                    <img src="{{ asset('admin/images/icons/forgot.png') }}" width="150" alt="" />
                </div>
                <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
                <p class="text-muted">Enter your registered email ID to reset the password</p>

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

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group mt-5">

                        <label>Email id</label>
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Send Password Reset Link') }}</button>

                </form>

                <a href="{{ route('login') }}" class="btn btn-link btn-block"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->

@endsection
