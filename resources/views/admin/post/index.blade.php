@extends('admin.layout')

@section('content')
<div class="col-lg-9 ">
    <div class="row">
        <div class="col-lg-11">
            <div class="card card-default">
                <div class="card-header">
                    <h5 class="j-post">Draft Post Nft</h5>
                </div>
                <div class="card-body">
                    @include('coolnft.partials.flash')
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="co">IMAGE</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">STATUS</th>
                                <th scope="col" class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $index => $post)
                            <tr>
                                <td>{{ $index +1 }}</td>
                                <td>
                                    <img src="{{ Storage::url('public/posts/').$post->image }}" class="rounded"
                                        style="width: 150px">
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->price }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->statusLabel() }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('post.destroy', $post->id) }}" method="POST">
                                        @can('edit_posts')
                                        <a href="{{ route('post.edit', $post->id) }}"
                                            class="btn-edit">EDIT</a>
                                        @endcan
                                        
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No records found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
