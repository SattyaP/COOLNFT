<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">

    <title>{{ config('APP_NAME', 'Dasboard') }}</title>

    {{-- asset --}}
    <link rel="stylesheet" href="{{ asset('coolnft/assets/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('coolnft/assets/css/bootstrap.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            /* background-color: rgb(0, 90, 199) !important; */
        }

    </style>
</head>

<body>


    @include('admin.partials.header')
    <div class="container-fluid mt-5">
        <div class="row">
            @include('admin.partials.sidebar')
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('coolnft/assets/js/script.js') }}"></script>
    {{-- <script src="{{ asset('coolnft/assets/js/bootstrap.min.js') }}"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </script>
</body>

</html>
