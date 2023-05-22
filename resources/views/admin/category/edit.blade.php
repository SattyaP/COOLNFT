@extends('admin.layout')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="text-white mt-2">Edit Category {{ $category->name}}</h4>
            </div>
            <div class="card-body">
                @include('coolnft.partials.flash', ['$errors' => $errors])
                <form action="{{ route('category.update', $category->id )}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <div class="label font-weight bold">Name</div>
                        <input type="text" class="form-control mb-3 @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" placeholder="please insert name category">

                        @error('name')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="label font-weight bold">Slug</div>
                        <input type="text" class="form-control mb-3 @error('slug') is-invalid @enderror" name="slug" value="{{ $category->slug }}" placeholder="please insert slug category">

                        @error('slug')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
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