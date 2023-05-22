@extends('admin.layout')

@section('content')
<div class="col-md-8">
    <div class="card p-3 border-0 shadow rounded">
        <div class="card-body">
            @include('coolnft.partials.flash', ['$errors' => $errors])
            <form action="{{ route('topup.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-group mb-3">
                    <label class="font-weight-bold form-label">Amount</label>
                    <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" placeholder="Masukkan amount">
                </div>
                
                <button type="submit" class="btn btn-md btn-primary">SEND</button>
                <a class="btn btn-secondary" href="{{ url('topup') }}">BACK</a>
            </form>
        </div>
    </div>
</div>
@endsection