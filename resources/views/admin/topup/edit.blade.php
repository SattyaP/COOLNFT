@extends('admin.layout')

@section('content')
    <div class="col-md-8">
        <div class="card border-0 shadow rounden">
            <div class="card-body">
                @include('coolnft.partials.flash', ['$errors' => $errors])
                <form action="{{ route('topup.update', $topup->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        {!! Form::label('status', 'Status') !!}
                        {!! Form::select('status', $status , null, ['class' => 'form-control', 'placeholder' => '-- Actions --']) !!}
                    </div>  

                    <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
@endsection