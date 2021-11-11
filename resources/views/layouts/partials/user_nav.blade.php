<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('user.home')}}">
            <img src="{{asset('img/brand/logo_home.png')}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
            aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{route('home')}}">
                            <img src="{{asset('img/brand/logo_home.png')}}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav mr-auto">
                @if (Auth::check() && Auth::user()->hasRole('user'))
                <li class="nav-item">
                    <a href="{{route('book')}}" class="nav-link">
                        <span class="nav-link-inner--text">Book</span>
                    </a>
                </li>
                @endif


                <li class="nav-item">
                    <a href="{{route('about')}}" class="nav-link">
                        <span class="nav-link-inner--text">About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('contact')}}" class="nav-link">
                        <span class="nav-link-inner--text">Contact</span>
                    </a>
                </li>
            </ul>

            <hr class="d-lg-none">
            <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="https://www.facebook.com/creativetim" target="_blank"
                        data-toggle="tooltip" data-original-title="Like us on Facebook">
                        <i class="fab fa-facebook-square"></i>
                        <span class="nav-link-inner--text d-lg-none">Facebook</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial"
                        target="_blank" data-toggle="tooltip" data-original-title="Follow us on Instagram">
                        <i class="fab fa-instagram"></i>
                        <span class="nav-link-inner--text d-lg-none">Instagram</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank"
                        data-toggle="tooltip" data-original-title="Follow us on Twitter">
                        <i class="fab fa-twitter-square"></i>
                        <span class="nav-link-inner--text d-lg-none">Twitter</span>
                    </a>
                </li>

                @if (Auth::check())
                <li class="nav-item ml-lg-4">
                    <span class="text-white">{{Auth::user()->name}}</span>
                </li>
               
                <li class="nav-item d-none d-lg-block ml-lg-4">
                    {{-- <a href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=ad_upgrade_pro"
                        target="_blank" class="btn btn-neutral btn-icon">
                        <span class="btn-inner--icon">
                            <i class="fas fa-shopping-cart mr-2"></i>
                        </span>
                        <span class="nav-link-inner--text">Upgrade to PRO</span>
                    </a> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{route('logout')}}" class="nav-link nav-link-icon" onclick="event.preventDefault();
                        this.closest('form').submit();">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </form>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>