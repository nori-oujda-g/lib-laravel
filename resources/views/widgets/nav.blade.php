{{-- <nav>
    <a href="/">home</a>
    <a href="/vars">vars</a>
    <a href="/test">test</a>
    <a href="/compact">compact</a>
</nav> --}}
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MY APP LARAVEL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vars') }}">vars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('test') }}">test</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('compact') }}">compact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users') }}">users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('customers') }}">customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rediriger') }}">rediriger vers test</a>
                </li>
                {{-- @guest
                @endguest --}}
            </ul>
        </div>
        @if (empty(Auth::guard('customer')->user()))
            <div class="navbar-nav float-end">
                <a class="nav-link" href="{{ route('login') }}">se connecter</a>
            </div>
        @endif
        @if (!empty(Auth::guard('customer')->user()))
            <div class="navbar-nav dropdown float-end">
                <ul class="nav-link dropdown-toggle btn-group" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false" style="padding:0;margin:0;">
                    <li class="btn">{{ Auth::guard('customer')->user()->name }}</li>
                    {{-- <li class="btn">{{ auth()->user()->name }}</li> --}}
                    <li class="btn" style="--bs-btn-padding-y:0;"> <img
                            src="{{ Auth::guard('customer')->user()->image }}" class="_image" alt=""
                            srcset=""></li>

                </ul>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown"
                    style="left:-8%;box-shadow: 2px 2px 4px 1px #323030;">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">se déconnecter</a></li>
                </ul>
            </div>
        @endif

        {{--    
        @auth
           @endauth --}}

    </div>
</nav>
