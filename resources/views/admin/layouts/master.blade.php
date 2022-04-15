<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
	<!--favicon-->
	<link rel="icon" href="{{asset('admin/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('admin/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/plugins/apexcharts-bundle/css/apexcharts.css') }}" rel="stylesheet" />
    <!--Data Tables -->
	<link href="{{ asset('admin/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('admin/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
	<!-- loader-->
	<link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('admin/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{ asset('admin/css/icons.css') }}" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{ asset('admin/css/app.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin/css/dark-style.css') }}" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />

</head>

<body>


    <!-- wrapper -->
	<div class="wrapper">
		<!--header-->
		<header class="top-header">
			<nav class="navbar navbar-expand">
				<div class="left-topbar d-flex align-items-center">
					<a href="javaScript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
					</a>
					<div class="logo-white">
                        <link rel="icon" href="{{asset('admin/images/logo-dark.png')}}" type="image/png" />
					</div>
					<div class="logo-dark">
                        <link rel="icon" href="{{asset('admin/images/logo-img.png')}}" type="image/png" />
					</div>
				</div>
				<div class="right-topbar ml-auto">
					<ul class="navbar-nav">
						<li class="nav-item search-btn-mobile">
							<a class="nav-link position-relative" href="javaScript:;">	<i class="bx bx-search vertical-align-middle"></i>
							</a>
						</li>
						<li class="nav-item dropdown dropdown-lg">
							<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javaScript:;" data-toggle="dropdown">	<i class="bx bx-bell vertical-align-middle"></i>
								<span class="msg-count">8</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a href="javaScript:;">
									<div class="msg-header">
										<h6 class="msg-header-title">8 New</h6>
										<p class="msg-header-subtitle">Application Notifications</p>
									</div>
								</a>
								<div class="header-notifications-list">
									<a class="dropdown-item" href="javaScript:;">
										<div class="media align-items-center">
											<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
											</div>
											<div class="media-body">
												<h6 class="msg-name">New Customers<span class="msg-time float-right">14 Sec
													ago</span></h6>
												<p class="msg-info">5 new user registered</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javaScript:;">
										<div class="media align-items-center">
											<div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
											</div>
											<div class="media-body">
												<h6 class="msg-name">New Orders <span class="msg-time float-right">2 min
													ago</span></h6>
												<p class="msg-info">You have recived new orders</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javaScript:;">
										<div class="media align-items-center">
											<div class="notify bg-light-shineblue text-shineblue"><i class="bx bx-file"></i>
											</div>
											<div class="media-body">
												<h6 class="msg-name">24 PDF File<span class="msg-time float-right">19 min
													ago</span></h6>
												<p class="msg-info">The pdf files generated</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javaScript:;">
										<div class="media align-items-center">
											<div class="notify bg-light-cyne text-cyne"><i class="bx bx-send"></i>
											</div>
											<div class="media-body">
												<h6 class="msg-name">Time Response <span class="msg-time float-right">28 min
													ago</span></h6>
												<p class="msg-info">5.1 min avarage time response</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javaScript:;">
										<div class="media align-items-center">
											<div class="notify bg-light-purple text-purple"><i class="bx bx-home-circle"></i>
											</div>
											<div class="media-body">
												<h6 class="msg-name">New Product Approved <span
													class="msg-time float-right">2 hrs ago</span></h6>
												<p class="msg-info">Your new product has approved</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javaScript:;">
										<div class="media align-items-center">
											<div class="notify bg-light-warning text-warning"><i class="bx bx-message-detail"></i>
											</div>
											<div class="media-body">
												<h6 class="msg-name">New Comments <span class="msg-time float-right">4 hrs
													ago</span></h6>
												<p class="msg-info">New customer comments recived</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javaScript:;">
										<div class="media align-items-center">
											<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
											</div>
											<div class="media-body">
												<h6 class="msg-name">Your item is shipped <span class="msg-time float-right">5 hrs
													ago</span></h6>
												<p class="msg-info">Successfully shipped your item</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javaScript:;">
										<div class="media align-items-center">
											<div class="notify bg-light-sinata text-sinata"><i class='bx bx-user-pin'></i>
											</div>
											<div class="media-body">
												<h6 class="msg-name">New 24 authors<span class="msg-time float-right">1 day
													ago</span></h6>
												<p class="msg-info">24 new authors joined last week</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javaScript:;">
										<div class="media align-items-center">
											<div class="notify bg-light-mehandi text-mehandi"><i class='bx bx-door-open'></i>
											</div>
											<div class="media-body">
												<h6 class="msg-name">Defense Alerts <span class="msg-time float-right">2 weeks
													ago</span></h6>
												<p class="msg-info">45% less alerts last 4 weeks</p>
											</div>
										</div>
									</a>
								</div>
								<a href="javaScript:;">
									<div class="text-center msg-footer">View All Notifications</div>
								</a>
							</div>
						</li>
						<li class="nav-item dropdown dropdown-user-profile">
							<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javaScript:;" data-toggle="dropdown">
								<div class="media user-box align-items-center">
									<div class="media-body user-info">
										<p class="user-name mb-0">{{ auth()->user()->name }}</p>
										<p class="designattion mb-0"><span class="dot-green"></span> online</p>
									</div>
									<img src="{{ asset( $user->image ? 'storage/'.$user->image : 'admin/images/avatars/no_image.jpg' ) }}" class="user-img" alt="profile image">
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right">

								<a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    <i class="bx bx-tachometer"></i><span>Dashboard</span>
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.profile', $user) }}">
                                    <i class="bx bx-user"></i><span>Profile</span>
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.profile', $user) }} #Change-Password">
                                    <i class="bx bx-key"></i><span>Change Password</span>
                                </a>

								<div class="dropdown-divider mb-0"></div>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class="bx bx-power-off"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

							</div>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!--end header-->

        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--sidebar-wrapper-->
            <div class="sidebar-wrapper" data-simplebar="true">
                <div class="sidebar-header">
                    <a href="javaScript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
                    </a>
                    <div class="logo-white">
                        <img src="{{asset('storage/logo-white.png')}}" class="logo-icon-2" alt="">
                    </div>
                    <div class="logo-dark">
                        <img src="{{asset('images/logo-dark.png')}}" class="logo-icon-2" alt="">
                    </div>
                </div>
                <!--navigation-->
                <ul class="metismenu" id="menu">
{{--                    <li>--}}
{{--                        <a href="{{ route('admin.dashboard') }}">--}}
{{--                            <div class="parent-icon"><i class="bx bx-home-alt"></i>--}}
{{--                            </div>--}}
{{--                            <div class="menu-title">Dashboard</div>--}}
{{--                        </a>--}}
{{--                    </li>--}}


{{--                    <li class="menu-label">Add Once</li>--}}

{{--                    agent --}}
                    <li>
                        <a class="has-arrow" href="javaScript:;">
                            <div class="parent-icon"><i class="bx bx-spa"></i>
                            </div>
                            <div class="menu-title">Agent</div>
                        </a>
                        <ul>
                            <li>  <a href="{{ route('admin.agents.index') }}">
                                    <i class="bx bx-group" id="first-level"></i>Add Agent</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.agents.create') }}">
                                    <i class="bx bx-file" id="first-level"></i>Agent Report</a>
                            </li>
                        </ul>
                    </li>

                    {{--                    Customer --}}
                    <li>
                        <a class="has-arrow" href="javaScript:;">
                            <div class="parent-icon"><i class="bx bx-spa"></i>
                            </div>
                            <div class="menu-title">Customer</div>
                        </a>
                        <ul>
                            <li>  <a href="{{ route('admin.customers.index') }}">
                                    <i class="bx bx-group" id="first-level"></i>Add Customer</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.customers.create') }}">
                                    <i class="bx bx-file" id="first-level"></i>Customer Report</a>
                            </li>
                        </ul>
                    </li>

{{--                    <li>--}}
{{--                        <a href="{{ route('admin.profile', $user) }}">--}}
{{--                            <div class="parent-icon"><i class="bx bx-user-circle"></i>--}}
{{--                            </div>--}}
{{--                            <div class="menu-title">Profile</div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('admin.siteInformation') }}">--}}
{{--                            <div class="parent-icon"><i class="bx bx-file"></i>--}}
{{--                            </div>--}}
{{--                            <div class="menu-title">Site Setting</div>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li class="menu-label">General Setting</li>


                    <li>
                        <a class="has-arrow" href="javaScript:;">
                            <div class="parent-icon"><i class="bx bx-spa"></i>
                            </div>
                            <div class="menu-title">Settings</div>
                        </a>
                        <ul>
                            <li>  <a href="{{ route('admin.profile', $user) }}">
                                    <i class="bx bx-user-circle" id="first-level"></i>Admin</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.siteInformation') }}">
                                    <i class="bx bx-file" id="first-level"></i>Site</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!--end navigation-->
            </div>
            <!--end sidebar-wrapper-->

            @yield('content')

        </div>
        <!--end page-wrapper-->



		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!--footer -->
		<div class="footer">
			<p class="mb-0">Travel Management System @2022 | Developed By : <a href="#">Zia Khan</a>
			</p>
		</div>
		<!-- end footer -->
	</div>
	<!-- end wrapper -->






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




    <!-- JavaScript -->
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
    <!--Data Tables js-->
    <script src="{{ asset('admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>

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

        /* switcher ends */


        function preview_img(input, img) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    img.attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#image_input_field').change(function () {
            preview_img(this, $('#image_preview'));
        });
        $('#image_input_field_1').change(function () {
            preview_img(this, $('#image_preview_1'));
        });
        $('#image_input_field_2').change(function () {
            preview_img(this, $('#image_preview_2'));
        });
        $('#image_input_field_3').change(function () {
            preview_img(this, $('#image_preview_3'));
        });
        $('#image_input_field_4').change(function () {
            preview_img(this, $('#image_preview_4'));
        });
        $('#image_input_field_5').change(function () {
            preview_img(this, $('#image_preview_5'));
        });
        $('#image_input_field_6').change(function () {
            preview_img(this, $('#image_preview_6'));
        });

    </script>

    @yield('script')


</body>

</html>
