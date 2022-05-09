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
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.peoples.index') }}">
                <div class="parent-icon"><i class="bx bx-group"></i>
                </div>
                <div class="menu-title">People</div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.cdrs.index') }}">
                <div class="parent-icon"><i class='bx bx-wallet-alt'></i>
                </div>
                <div class="menu-title">Cdrs</div>
            </a>
        </li>

        <li>
            <a class="has-arrow" href="javaScript:">
                <div class="parent-icon"><i class='bx bxs-doughnut-chart'></i>
                </div>
                <div class="menu-title">project</div>
            </a>
            <ul>
                <li>  <a href="{{ route('admin.projects.index') }}">
                        <i class="bx bx-group" id="first-level"></i>Add Project</a>
                </li>
                <li>
                    <a href="{{ route('admin.projects.create') }}">

                        <i class="bx bx-receipt" id="first-level"></i></a>
                </li>
            </ul>
        </li>

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

    {{--                    <li>--}}
    {{--                                            <a class="has-arrow" href="javaScript:;">--}}
    {{--                                                <div class="parent-icon"><i class="bx bx-spa"></i>--}}
    {{--                                                </div>--}}
    {{--                                                <div class="menu-title">Customer</div>--}}
    {{--                                            </a>--}}
    {{--                                            <ul>--}}
    {{--                                                <li>  <a href="{{ route('admin.customers.index') }}">--}}
    {{--                                                        <i class="bx bx-group" id="first-level"></i>Add Customer</a>--}}
    {{--                                                </li>--}}
    {{--                                                <li>--}}
    {{--                                                    <a href="{{ route('admin.visas.index') }}">--}}
    {{--                                                        <i class="bx bx-file" id="first-level"></i>Add Visa</a>--}}
    {{--                                                </li>--}}
    {{--                                                <li>--}}
    {{--                                                    <a href="{{ route('admin.customers.create') }}">--}}
    {{--                                                        <i class="bx bx-file" id="first-level"></i>Customer Report</a>--}}
    {{--                                                </li>--}}
    {{--                                            </ul>--}}
    {{--                                        </li>--}}

    {{--                    <li>--}}
    {{--                        <a href="{{ route('admin.agents.create') }}">--}}
    {{--                            <div class="parent-icon"><i class="bx bx-group"></i>--}}
    {{--                            </div>--}}
    {{--                            <div class="menu-title">Add Agent/Customer</div>--}}
    {{--                        </a>--}}
    {{--                    </li>--}}
</div>
