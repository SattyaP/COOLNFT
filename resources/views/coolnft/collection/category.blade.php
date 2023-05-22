{!! Form::open(['method'=>'GET','url'=>'filterCategory','role'=>'filter']) !!}
<div class="input-group">
    <select class="form-select" aria-label="Default select example" name="filter">
        <option selected>-- Choose Category --</option>
        @foreach ($category as $categories)
        <option value="{{ $categories->id }}">{{ $categories->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Search</button>
</div>
{!! Form::close() !!}