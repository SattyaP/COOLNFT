<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail NFT</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&display=swap');

        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: "Merriweather", serif;
            list-style: none;
            text-decoration: none !important;
            /* overflow-x: hidden; */
        }

        .container-show {
            width: 70%;
            margin: 80px auto;
            justify-content: center;
        }

        .btn-close {
            float: right;
            margin-top: -40px;
            margin-right: 80px;
        }

        .container-show h3 {
            font-size: 18px;
            font-weight: 600;
        }

        .container-show h2 {
            font-size: 54px;
            font-weight: 600;
        }

        .container-show h5 {
            font-size: 20px;
            background-color: green;
            width: 120px;
            text-align: center;
            padding: 5px;
            color: #fff;
        }

        .container-show p {
            margin-top: 25px;
        }

        .btn-buy {
            font-size: 18px;
            border: none;
            text-align: center;
        
            background-color: #005ac7;
            color: #fff;
            padding: 10px 30px;
            border-radius: 10px;
        }

        .btn-buy:hover {
            font-size: 18px;
            border: 1px solid #005ac7;
            background-color: transparent;
            width: 130px;
            text-align: center;
            height: 40px;
            color: #005ac7;
            transition: 0.5s ease-in-out;
        }

        .btn-bid {
            font-size: 18px;
            border: none;
            width: 100px;
            text-align: center;
            height: 40px;
            background-color: rgb(153, 153, 153);
            color: #fff;
            transition: 0.5s ease-in-out;
            border-radius: 10px;
        }

        .btn-bid:hover {
            font-size: 18px;
            border: 1px solid grey;
            width: 100px;
            text-align: center;
            height: 40px;
            background-color: transparent;
            color: grey;
        }

        .container-show h1 {
            font-size: 32px;
        }

        .container-show h4 {
            font-size: 16px;
            font-weight: 600;
            font-style: italic;
        }

    </style>
</head>

<body>
    <a href="/"><button type="button" class="btn-close" aria-label="Close"></button></a>
    <div class="container-show">
        @include('coolnft.partials.flash')
        <div class="row">
            <div class="col-md-6 ">
                <img class="img-fluid" src="{{ Storage::url('public/posts/').$post->image }}">
                @if ($post->user_id == $user->id)
                <h4 class="mt-2"><span style="color: #005ac7">Owned</span> By {{ $post->user->name }} ( you )</h4>
                @else
                <h4 class="mt-2"><span style="color: #005ac7">Owned</span> By {{ $post->user->name }}</h4>
                @endif
            </div>
            <div class="col-md-6">
                <h3 style="background-color: #005ac7; padding: 5px 20px; color: #fff">{{ $post->category->name }}</h3>
                <h2>{{ $post->title }}</h2>
                <h5>{{ $post->price }} ETH</h5>
                <p>{{ $post->description }}</p>
                <span style="font-weight: 600">{{ $post->created_at }}</span><br>
                <br>
                @if ($post->user_id == $user->id)
                    {{-- <div class="alert alert-secondary" role="alert">
                    Already Buy
                  </div> --}}
                @else
                    <a href="#" class="btn-buy" onclick="event.preventDefault();
                    document.getElementById('complete-form-{{ $post->id }}').submit();"> Buy now</a>

                    {!! Form::open(['url' => 'order/store/'. $post->id, 'id' => 'complete-form-'. $post->id,
                    'style' => 'display:none']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
            <div class="col-md-12 mt-5">
                <h1 class="text-center">Daftar Bid</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama User</th>
                            <th>Jumlah Bid</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post->postOrder as $posts)
                        <tr>
                            <td>{{ $posts->user->name }}</td>
                            <td>{{ $posts->price }}</td>
                            <td>{{ $posts->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
