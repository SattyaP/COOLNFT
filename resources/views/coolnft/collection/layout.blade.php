<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">

    <title>{{ config('APP_NAME', 'COOLNFT | Buy and Find NFT & Trade Yours') }}</title>

    {{-- asset --}}
    <link rel="stylesheet" href="{{ asset('coolnft/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('coolnft/assets/css/bootstrap.min.css') }}">

</head>
<body>
    
    @include('coolnft.partials.header')
    <div class="container mt-4">
        <div class="row">
            <div class="col-6">
                @include('coolnft.collection.search')
            </div>
            <div class="col-6 mb-4">
                @include('coolnft.collection.category')
            </div>
            @include('coolnft.collection.index')
        </div>

    </div>
    @yield('content')

    <script src="{{ asset('coolnft/assets/js/script.js') }}"></script>
    <script src="{{ asset('coolnft/assets/js/bootstrap.min.js') }}"></script>
</body>
</html> 