@extends('coolnft.layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('register.user') }}" method="POST">
        @csrf

        <div class="row">   
            <div class="col-lg-6 mt-2">
                <div class="left-login">

                    <div class="card-isi">
                        <h1>Create an Account</h1>
                        <p class="text-center">Helo are u new? i hope u enjoy !</p>


                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" required
                            autofocus>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        
                        <div class="mb-2">
                            <label for="email_address" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email_address" placeholder="name@example.com" required
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
                        <h5>Already have account ? <span><a href="login">Sign in</a></span></h5>
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