<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Dashboard</li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="icon-accelerator"></i><span> Dashboard </span>
                    </a>
                </li>


                <li class="menu-title">Menus</li>


                <li
                    class="mm-active">
                    <a href="{{ route('orders.index') }}"
                       class="waves-effect mm-active">
                        <i class="icon-check"></i>
                        <span>Orders</span>
                    </a>
                </li>


                <li
                    class="mm-active">
                    <a href="{{ route('orders.track') }}"
                       class="waves-effect mm-active">
                        <i class="icon-profile"></i>
                        <span>Track Orders</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->
