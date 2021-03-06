<!-- Header -->
<div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                    <h1 class="text-white">Welcome!</h1>
                    <p class="text-lead text-white">Browash Laundry is committed to providing quality
                        laundry and dry cleaning service for our clients.</p>
                    @if (Auth::check() && Auth::user()->hasRole('user'))
                    <div class="text-center mt-5">
                        <a href="{{route('book')}}" type="button" class="btn btn-default text-white">Book</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
            xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>

<!-- Page content -->
@if (Auth::check())

@else
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary border-0 mb-0">
                <div class="card-header bg-transparent">
                    <div class="text-muted text-center mt-2"><small>Sign In</small></div>

                </div>
                <div class="card-body px-lg-5 py-lg-5">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-red mb-2">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        <div class="form-group mb-3">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input name="email" id="email" class="form-control" placeholder="Email" type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input name="password" class="form-control" placeholder="Password" type="password">
                            </div>
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                            <label class="custom-control-label" for=" customCheckLogin">
                                <span class="text-muted">Remember me</span>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <a href="#" class="text-light"><small>Forgot password?</small></a>
                </div>
                <div class="col-6 text-right">
                    <a href="/register" class="text-light"><small>Create new account</small></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif