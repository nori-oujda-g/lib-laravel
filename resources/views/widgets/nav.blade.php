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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown-notion-base" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        notions de base
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown-notion-base">
                        <li><a class="dropdown-item" href="{{ route('vars') }}">vars</a>
                        <li><a class="dropdown-item" href="{{ route('test') }}">test</a>
                        <li><a class="dropdown-item" href="{{ route('compact') }}">compact</a>
                        <li><a class="dropdown-item" href="{{ route('users') }}">users</a>
                        <li><a class="dropdown-item" href="{{ route('rediriger') }}">redir vers test</a>
                        <li><a class="dropdown-item" href="/facult/22">param facult</a>
                        <li><a class="dropdown-item" href="/route">route info</a>
                        <li><a class="dropdown-item" href="{{ route('facebook') }}">dedirect vers ext</a>
                        <li><a class="dropdown-item" href="/file2">lire fichier pdf</a>
                        <li><a class="dropdown-item" href="#">void</a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown-api" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Api
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown-api">
                        <li><a class="dropdown-item" href="/api/api1">simple exp</a></li>
                        <li><a class="dropdown-item" href="/api/customers">customers</a></li>
                        <li><a class="dropdown-item" href="/api/customers/2">show customer</a></li>
                    </ul>
                </li>
                @if (!empty(Auth::guard('customer')->user()) && Auth::guard('customer')->user()->is_admin)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customers.index') }}">customers</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('publications.all') }}">publications</a>
                </li>
                @if (!empty(Auth::guard('customer')->user()))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-publication" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            my profil
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown-publication">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="{{ route('publications.create') }}">new pub</a></li>
                            <li><a class="dropdown-item" href="{{ route('publications.index') }}">my pubs</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                @endif
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
                    <li class="btn">
                        id: {{ Auth::guard('customer')->user()->id }}<br>
                        name: {{ Auth::guard('customer')->user()->name }}
                    </li>
                    {{-- <li class="btn">{{ auth()->user()->name }}</li> --}}
                    {{-- <li class="btn" style="--bs-btn-padding-y:0;"> <img
                            src="{{ Auth::guard('customer')->user()->image }}" class="image" alt=""
                            srcset=""></li> --}}
                    <li class="btn" style="--bs-btn-padding-y:0;"> <img
                            src="{{ asset('storage/' . Auth::guard('customer')->user()->avatar) }}" class="image"
                            alt="" srcset=""></li>

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
