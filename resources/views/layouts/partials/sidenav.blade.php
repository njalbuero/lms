<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{asset('img/brand/logo.png')}}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.dashboard')}}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.manage-orders')}}">
                            <i class="ni ni-bag-17 text-orange"></i>
                            <span class="nav-link-text">Manage Orders</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.washing')}}">
                            <i class="ni ni-basket text-info"></i>
                            <span class="nav-link-text">Washing</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.pickup-and-delivery')}}">
                            <i class="ni ni-delivery-fast text-pink"></i>
                            <span class="nav-link-text">Pickup & Delivery</span>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.reports')}}">
                            <i class="ni ni-single-copy-04 text-default"></i>
                            <span class="nav-link-text">Reports</span>
                        </a>
                    </li>
                </ul>
               
            </div>
        </div>
    </div>
</nav>