@extends('auth.layouts.master')

@section('content')

    @php
        $siteInformation = \App\Models\SiteInformation::first();
    @endphp
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
{{--                 <img src="{{ asset($siteInformation ? $siteInformation->agency_logo ? 'storage/'.$siteInformation->agency_logo : '' : '') }}" width="180" alt=""/>--}}
                    <link rel="icon" {{asset($siteInformation ? $siteInformation->ageny_youtube ? 'storage/'.$siteInformation->ageny_youtube: '' : '')}} type="image/png" />

                    <h4 class="mt-5"><strong>Welcome Back</strong></h4>
                    <p>Log in to your account using email & password</p>

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

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mt-4">
                            <label>{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Password') }}</label>
                            <div class="input-group" id="show_hide_password">
                                <input id="password" type="password" value="{{ old('password') }}" class="form-control border-right-0 @error('password') is-invalid @enderror" name="password" autocomplete="password">
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

                        <div class="form-row">
                            <div class="form-group col">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customSwitch1">{{ __('Remember Me') }}</label>
                                </div>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="form-group col text-right">
                                    <a href="{{ route('password.request') }}"><i class='bx bxs-key mr-2'></i>Forgot Password?</a>
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-3"><i class='bx bxs-lock mr-1'></i>{{ __('Login') }}</button>

                        @if (Route::has('register'))
                            <div class="text-center mt-4">
                                <p class="mb-0">Dont' have an account yet? <a href="{{ route('register') }}">Create an account</a></p>
                            </div>
                        @endif
                    </form>
                </div>
             </div>
           </div>
           <div class="col-12 col-lg-7 col-xl-8 d-flex align-items-stretch">
             <div class="card mb-0 shadow-none bg-transparent w-100 rounded-0">
                <div class="card-body p-md-5">
{{--                    <link rel="icon" type="image/png" />--}}

                    <div><h4 class="mt-5 ml-1"><strong>{{$siteInformation ? $siteInformation->agency_name ? 'Welcome '. $siteInformation->agency_name: 'Welcome' : 'Welcome'}}</strong></h4></div>
{{--                    <div class="text-center"><img src="https://images.unsplash.com/photo-1617113937231-7942715f868e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1473&q=80" class="img-fluid" alt=""/></div>--}}
                    <div class="text-center"><img src="{{asset($siteInformation? $siteInformation->agency_instagram ? 'storage/'.$siteInformation->agency_instagram: '' : '')}} " class="img-fluid" alt=""/></div>
                </div>
             </div>
            </div>
           </div>
           </div>
           <div class="card-footer bg-transparent px-md-5">
            <div class="d-flex align-items-center justify-content-between flex-wrap">


                @include('auth.layouts._developedBy')

                <ul class="list-inline mb-0">
                   <li class="list-inline-item"><a href="javascript:void();">Privacy Policy</a></li>
                   <li class="list-inline-item"><a href="javascript:void();">Contact</a></li>
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
    });
</script>

@endsection
