<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    {{-- <img src="{{ asset('backend/assets/images/footer-logo.png') }}" height="20px" width="" alt=""> --}}
    @php

    @endphp

    <div class="topbar-left">
        <a href="#" class="logo">
            <span class="logo-light">Tracker
            </span>
            <span class="logo-sm">

            </span>
        </a>
    </div>

    <nav class="navbar-custom">
        <ul class="navbar-right list-inline float-right mb-0">
            <!-- full screen -->
            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                    <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                </a>
            </li>

            <!-- notification -->
            <li class="dropdown notification-list list-inline-item">
                <span>User</span>
            </li>

            <li class="dropdown notification-list list-inline-item">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('backend/assets/images/avater.png') }}" alt=""
                            class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-lock"></i> Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-power text-danger"></i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="#" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
        </ul>
    </nav>
</div>
<!-- Top Bar End -->
