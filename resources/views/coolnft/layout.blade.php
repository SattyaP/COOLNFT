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

    @include('coolnft.partials.hero')

    <div class="section-2">
    @include('coolnft.partials.opening')
    @include('coolnft.partials.penjelasan')
    @include('coolnft.partials.meme')
    <div class="container">
        <div class="hr-om my-5"></div>
    </div>
    @include('coolnft.partials.bestSelling_nft')
    @include('coolnft.partials.latest_nft')

    @yield('content')

    @include('coolnft.partials.footer')
    </div>
    

    <script src="{{ asset('coolnft/assets/js/script.js') }}"></script>
    <script src="{{ asset('coolnft/assets/js/bootstrap.min.js') }}"></script>
</body>
</html> 