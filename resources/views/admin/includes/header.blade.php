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
