@extends('admin.layout')

@section('content')
<div class="col-md-8">
    <div class="card border-0 shadow rounded">
        <div class="card-body">
            @include('coolnft.partials.flash', ['$errors' => $errors])
            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label class="font-weight-bold">IMAGE</label>
                    <input type="file" class="form-control" name="image">
                </div>


                <div class="form-group mb-3">
                    <label class="font-weight-bold">TITLE</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ $post->title }}" placeholder="Masukkan Judul Post">
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">PRICE</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ $post->price }}" placeholder="Masukkan Price Post">
                </div>

                <label for="category" class="font-weight-bold form-label">CATEGORY</label>
                <select id="category" class="form-select mb-3" aria-label="Default select example" name="category_id" >
                    @foreach ($category as $categories)
                    <option value="{{ $categories->id }}" {{ (in_array($categories->id, $selected)) ? 'selected' : '' }}>{{ $categories->name}}</option>
                    @endforeach
                </select>


                <div class="form-group mb-3">
                    <label for="textarea" class="form-label">DESCRIPTION</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="textarea" rows="3"
                        placeholder="Masukan deskripsi" value="{{ $post->description }}"></textarea>
                </div>

                <div class="form-group mb-3">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', $status , null, ['class' => 'form-control', 'placeholder' => '-- Set Status --']) !!}
                </div>      


                <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                <button type="reset" class="btn btn-md btn-warning">RESET</button>

            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
