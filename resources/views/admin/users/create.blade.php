@extends('admin.layout')

@section('title', 'Create')

@section('content')
<div class="col-lg-8">
    <div class="card p-3 card-default">
        @include('coolnft.partials.flash',['$errors' => $errors])
        <form action="{{ route('users.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group mb-3">
                <label class="font-weight-bold form-label">NAMA</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" placeholder="Masukkan Nama User">
            </div>

            <div class="form-group mb-3">
                <label class="font-weight-bold form-label">EMAIL</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" placeholder="Masukkan Email User">
            </div>

            <div class="form-group mb-3">
                <label class="font-weight-bold form-label">PASSWORD</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    value="{{ old('password') }}" placeholder="Masukkan Password User">
            </div>

            <div class="form-group mb-3 @if ($errors->has('roles')) has-error @endif">
                {!! Form::label('roles[]', 'Roles') !!}
                {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null, ['class'
                => 'form-control', 'multiple']) !!}
                @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
            </div>
     
            <button class="btn btn-primary" type="submit">Save</button>

            @if(isset($user))
            <div class="form-group">
                <label>Override Permissions</label>
            </div>
            <div class="row">
                @foreach($permissions as $perm)
                <?php
                $per_found = null;

                if( isset($role) ) {
                    $per_found = $role->hasPermissionTo($perm->name);
                }

                if( isset($user)) {
                    $per_found = $user->hasDirectPermission($perm->name);
                }
            ?>

                <div class="col-md-3">
                    <div class="checkbox">
                        <label class="{{ Str::contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                            {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options :
                            []) !!} {{ $perm->name }}
                        </label>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </form>
    </div>
</div>
@endsection
