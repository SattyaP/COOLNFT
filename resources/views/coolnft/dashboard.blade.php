<!DOCTYPE html>
<html>

<head>
    <title>{{ config('APP_NAME', 'Dashboard') }}</title>
    {{-- asset --}}
    <link rel="stylesheet" href="{{ asset('coolnft/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('coolnft/assets/css/bootstrap.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('coolnft.sistem.navbar')

    <div class="row">

        
        @yield('test')

    </div>

    <script src="{{ asset('coolnft/assets/js/script.js') }}"></script>
    <script src="{{ asset('coolnft/assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
