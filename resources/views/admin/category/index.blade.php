@extends('admin.layout')

@section('content')
<div class="col-md-8">  
    <div class="card">
        <div class="card-header">
            <h5 class="j-post">Category</h5>
        </div>
        <div class="card-body">
            @include('coolnft.partials.flash')
            <table class="table">
                <thead>
                    <tr>    
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($category as $index => $categories)
                    <tr>
                        <td>{{ $index +1 }}</td>
                        <td>{{ $categories->name}}</td>
                        <td>{{ $categories->slug}}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('category.destroy', $categories->id) }}" method="POST">
                                <a href="{{ route('category.edit', $categories->id) }}" class="btn-edit">EDIT</a>
                                @csrf   
                                @method('DELETE')
                                <button type="submit" class="btn-delete">DELETE</button>
                            </form>
                        </td>
                        @empty
                        <div class="alert alert-danger">
                            Uknown Data Category
                        </div>
                        @endforelse
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
