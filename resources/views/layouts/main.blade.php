<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>InspiraUMKM | {{ $title }}</title>

    @include('vendors.mains')

</head>

<body>
    @include('vendors.icons')

    @include('partials.theme')

    @include('partials.navbar')

    <div class="{{ Request::is('/') ? 'container-fluid' : 'container' }} {{ Request::is('/') ? '' : 'mt-4' }}"
        style="min-height: 100vh;">
        @yield('container')
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/color-modes.js') }}"></script>
</body>

</html>
