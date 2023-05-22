@extends('admin.layout')

@section('content')

<div class="col-md-8">
    <div style="background-color: #004090; width: 180px; color: #fff; margin-left: 705px" class="p-3 text-center ">
        @if ($user->balance == NULL)
        <p class="mb-0 font-weight-bold">My Balance : 0</p>
        @else
        <p class="mb-0 font-weight-bold">My Balance : {{ $user->balance }}</p>
        @endif
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h5 class="j-post">Top Up</h5>
        </div>
        <div class="card-body">
            @include('coolnft.partials.flash')
            <table class="table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Top Up</th>
                        <th>Time</th>
                        <th>Status</th>
                        @if ( $user->roles->implode('name', ', ') == 'Admin')
                        <th>Actions</th>
                        @else 
                        
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($topup as $topups)
                    <tr>
                        <td>{{ $topups->user->name }}</td>
                        <td>{{ $topups->amount }}</td>
                        <td>{{ $topups->created_at }}</td>
                        <td>{{ $topups->statusLabel() }}</td>
                        @if ( $user->roles->implode('name', ', ') == 'Admin')
                            @if ( $topups->statusLabel() == 'success')
                            <td >
                            </td>
                            @else
                            <td>
                                <a class="btn btn-primary" href="{{ route('topup.edit', $topups->id) }}">Edit</a>
                            </td>
                            @endif
                        @else

                        @endif

                        @empty
                        <td colspan="5">No one top up</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
