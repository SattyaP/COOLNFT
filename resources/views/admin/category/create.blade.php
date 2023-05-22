@extends('admin.layout')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="text-white">Create Category</h4>
            </div>
            <div class="card-body">
                @include('coolnft.partials.flash', ['$errors' => $errors])
                <form action="{{ route('category.store')}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    
                    <div class="form-group">
                        <div class="label font-weight bold">Name</div>
                        <input type="text" class="form-control mb-3 @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" placeholder="please insert name category">
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">SAVE</button>
                        <a class="btn btn-secondary" href="{{ url('category') }}">BACK</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection