@extends('coolnft.layouts.app')

@section('content')
    <div class="container-fluid ">
        <form method="POST" action="{{ route('login.user') }}">
            @csrf

            <div class="row">   
                <div class="col-lg-6 mt-5">
                    <div class="left-login">

                        <div class="card-isi">
                            <h1>Welcome Back</h1>
                            <p>We are always waiting your for comeback</p>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required
                                autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password" class="col-sm-2 col-form-label"> Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-12 mb-3">
                            <input class="form-check-input" name="remember" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Remember me
                            </label><br>
                            </div>
                            <button type="submit" class="btn-login">Sign In</button>
                            <h5>Dont have account ? <span><a href="register">Sign Up</a></span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="right-login">
                        <img class="img-fluid" src="{{ asset('coolnft/img/-1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection