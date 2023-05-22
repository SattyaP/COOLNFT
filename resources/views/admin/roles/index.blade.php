@extends('admin.layout')

@section('title', 'Roles & Permissions')

@section('content')
<!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['method' => 'post']) !!}

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="roleModalLabel">Role</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        
            <div class="modal-body">
                <!-- name Form Input -->
                <div class="form-group @if ($errors->has('name')) has-error @endif">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Role Name']) !!}
                    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <!-- Submit Form Button -->
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="col-lg-8">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2 class="j-post">Roles and Permissions</h2>
        </div>
        <div class="card-body">
            @include('coolnft.partials.flash')
            <div id="accordion-role-permission" class="accordion accordion-bordered ">
                @forelse ($roles as $role)
                {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update', $role->id ], 'class' => 'm-b'])
                !!}
                <div class="mb-3"></div>
                @if($role->name === 'Admin')
                @include('admin.roles._permissions', ['title' => $role->name .' Permissions', 'options' => ['disabled'],
                'showButton' => true])
                @else
                @include('admin.roles._permissions', ['title' => $role->name .' Permissions', 'model' => $role,
                'showButton' => true])
                @endif

                {!! Form::close() !!}

                @empty
                <p>No Roles defined, please run <code>php artisan db:seed</code> to seed some dummy data.</p>
                @endforelse
            </div>
        </div>
        @can('add_roles')
        <div class="card-footer text-right">
            <a href="#" class="btn btn-success pull-right" data-bs-toggle="modal" data-bs-target="#roleModal"> <i
                    class="glyphicon glyphicon-plus"></i> New Role</a>
        </div>
        @endcan
    </div>
</div>

@endsection
