<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">

    <title>COOLNFT | Buy and Find NFT & Trade Yours - @yield('title')</title>  

    {{-- asset --}}
    <link rel="stylesheet" href="{{ asset('coolnft/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('coolnft/assets/css/bootstrap.min.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    @include('coolnft.partials.header')

    <main>
        @yield('content')
    </main>

    </div>
    <script src="{{ asset('coolnft/assets/js/script.js') }}"></script>
    <script src="{{ asset('coolnft/assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
