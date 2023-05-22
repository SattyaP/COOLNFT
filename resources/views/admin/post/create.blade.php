@extends('admin.layout')

@section('content')
            <div class="col-md-8">
                <div class="card p-3 border-0 shadow rounded">
                    <div class="card-body">
                        @include('coolnft.partials.flash', ['$errors' => $errors])
                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">IMAGE</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold form-label">TITLE</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Post">
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold form-label">PRICE</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Masukkan Price Post">
                            </div>
                            
                            <label for="category" class="font-weight-bold form-label">CATEGORY</label>
                            <select id="category" class="form-select mb-3" aria-label="Default select example" name="category_id" >
                                <option selected>-- Choose Category --</option>
                                @foreach ($category as $categories)
                                <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                @endforeach
                            </select>

                            <div class="form-group mb-3">
                                <label for="textarea" class="form-label">DESCRIPTION</label>
                                <textarea name="description" class="form-control" id="textarea" rows="3" placeholder="Masukan deskripsi"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <a class="btn btn-secondary" href="{{ url('category') }}">BACK</a>
                        </form> 
                    </div>
                </div>
            </div>
@endsection