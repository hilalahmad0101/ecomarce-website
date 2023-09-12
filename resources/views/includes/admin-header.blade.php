<div class="main-header ">
    <!-- Logo Header -->
    <div class="logo-header">

        <a href="/" class="logo">
            <img src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634218044logoforsite.png"
                alt="navbar brand" class="navbar-brand">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fa fa-bars"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
        <div class="navbar-minimize">
            <button class="btn btn-minimize ">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg">
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item mr-4">
                    <a class="btn btn-sm btn-primary py-1 text-white" title="website"
                        href="/" target="_blank">
                        <b> View Website</b>
                    </a>
                </li>
              

                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown"
                        href="" aria-expanded="false">
                        <div class="avatar-sm avatar avatar-sm">
                            <img src="{{ asset('storage') }}/{{ Auth::guard('admin')->user()->image }}"
                                alt="..." class="avatar-img rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg"><img
                                        src="{{ asset('storage') }}/{{ Auth::guard('admin')->user()->image }}"
                                        alt="image profile" class="avatar-img rounded"></div>

                                <div class="u-text">
                                    <h4>{{ Auth::guard('admin')->user()->username }}</h4>
                                    <p class="text-muted">{{ Auth::guard('admin')->user()->email }}</p><a
                                        href="{{ route('admin.profile.view') }}"
                                        class="btn  btn-secondary btn-sm">Update Profile</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                                href="{{ route('admin.profile.view') }}">Update
                                Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                                href="{{ route('admin.logout') }}">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>