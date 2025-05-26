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
            </ul>
        </div>
    </div>
</nav>
