<div class="col-lg-3 col-md-2 col-sm-6 mt-0">
    <ul class="sidebar">
        <li><a href="/">HomePage</a></li>
        <li><a href="{{ url('admin/post') }}">Post</a></li>
        <li><a href="{{ route('post.create') }}">Add Post</a></li>
        @can('view_categories')
        <li><a href="{{ url('admin/category') }}">Category</a></li>
        @endcan
        @can('add_categories')
        <li><a href="{{ route('category.create') }}">Add Category</a></li>
        @endcan
        @can('view_users')
        <li><a href="{{ url('admin/users') }}">User</a></li>
        @endcan
        @can('add_users')
        <li><a href="{{ route('users.create') }}">Add User</a></li>
        @endcan
        @can('view_roles')
        <li><a href="{{ url('admin/roles') }}">Role</a></li>
        @endcan
        <li><a href="{{ url('admin/topup') }}">List Topup</a></li>
        <li><a href="{{ route('topup.create') }}">Topup</a></li>
        @if(Auth::user()->roles->implode('name', ', ') == "Admin") 
        <li><a href="{{ url('admin/order') }}">Order</a></li>
        @endif
        
    </ul>
</div>