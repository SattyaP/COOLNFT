@extends('admin.layout')

@section('content')
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-11">
                <div class="card">
                    <div class="card-header">
                        <div class="j-post">Order List</div>
                    </div>
                    <div class="card-body">
                        @include('coolnft.partials.flash')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Price</th>
                                    <th>Owned by</th>
                                    <th>Time</th>
                                </tr>
                            </thead>         
                            <tbody>
                                @forelse ($posts as $post)    
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->price }}</td>
                                    <td>{{ $post->user->name}}</td>
                                    <td>{{ $post->created_at}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No post found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection