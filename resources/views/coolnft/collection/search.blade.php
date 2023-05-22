{!! Form::open(['method'=>'GET','url'=>'searchPost','role'=>'search']) !!}
<div class="input-group custom-search-form">
    <input type="text" class="form-control" name="search" placeholder="Search...">
    <span class="input-group-btn">
        <span class="input-group-btn">
            <button class="btn btn-default btn-primary" type="submit">Search</button>
        </span>
    </span>
</div>
{!! Form::close() !!}
