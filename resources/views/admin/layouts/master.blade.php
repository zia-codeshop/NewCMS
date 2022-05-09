<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('admin.includes.head')

<body>

@php
$user = \App\Models\User::where('id', auth()->user()->id)->first();
@endphp

    <!-- wrapper -->
	<div class="wrapper">
		<!--header-->
		@include('admin.includes.header');
		<!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--sidebar-wrapper-->
            @include('admin.includes.sidebar')
            <!--end sidebar-wrapper-->
            @yield('content')

        </div>
        <!--end page-wrapper-->



		<!--start overlay and footer-->
		@include('admin.includes.footer');

    @yield('script')


</body>

</html>
