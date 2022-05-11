<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>



  <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $siteInformation->agency_name }}</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset($siteInformation ? $siteInformation->agency_youtube ? 'storage/'.$siteInformation->agency_youtube : '' : '') }}" type="image/png"/>
{{--      <link rel="icon" href="{{asset('admin/images/favicon-32x32.png')}}" type="image/png" />--}}
	<!-- loader-->
    <link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('admin/js/pace.min.js') }}"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/icons.css') }}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin/css/dark-style.css') }}" />
  </head>

  <body class="{{ Route::currentRouteName() == 'password.request' ? 'bg-forgot' : '' }}">


  @yield('content')


        <!--start switcher-->
        <div class="switcher-wrapper">
            <div class="switcher-btn">
                <i class='bx bx-cog bx-spin'></i>
            </div>
            <div class="switcher-body">
            <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
            <hr/>
            <h6 class="mb-0">Theme Styles</h6>
            <hr/>
            <div class="custom-control custom-radio">
                <input type="radio" id="darkmode" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="darkmode">Dark Mode</label>
            </div>
            <hr/>
            <div class="custom-control custom-radio">
                <input type="radio" id="lightmode" name="customRadio" checked class="custom-control-input">
                <label class="custom-control-label" for="lightmode">Light Mode</label>
            </div>
            </div>
        </div>
    <!--end switcher-->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
	<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('admin/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<!--Apex chart-->
	<script src="{{ asset('admin/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
	<script src="{{ asset('admin/js/index.js') }}"></script>
	<!-- App JS -->
	<script src="{{ asset('admin/js/app.js') }}"></script>

    <script>
    /*switcher*/

        $(".switcher-btn").on("click", function () {
            $(".switcher-wrapper").toggleClass("switcher-toggled");
        });

        $("#darkmode").on("click", function () {
            $("html").addClass("dark-theme");
        });

        $("#lightmode").on("click", function () {
            $("html").removeClass("dark-theme");
        });
    </script>

    @yield('script')


    </body>
</html>
