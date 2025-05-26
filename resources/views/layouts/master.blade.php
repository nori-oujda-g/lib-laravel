<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>my lib laravel | @yield('title') </title>
</head>

<body>
    @include('widgets.nav')
    <h1 style="text-align:center;">my lib laravel</h1>
    <main>
        @yield('main')
    </main>
    <footer class="mt-4 py-4 col-12" style="background: black;color:white;">
        <p style="text-align:center;">&copy 2025 </p>
    </footer>
</body>

</html>
