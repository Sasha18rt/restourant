@extends('admin')
@section('users') active @endsection
@section('content')
<head>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css">
  
	<script src="https://code.jquery.com/jquery-3.7.1.js" ></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js" ></script>
</head>


    <div class="card">
    <table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Function</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td> <!-- Поле 'id' на початку -->
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td> <!-- Додано поле 'created_at' -->
            <td>
                @if($user->usertype == '0')
                <a href="{{ url('/deleteuser', $user->id) }}" class="btn btn-delete-user">Delete</a>
                @else
                <span class="text-muted">Not Allowed</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


    <script>new DataTable('#example', {
    layout: {
        bottomEnd: {
            paging: {
                boundaryNumbers: false
            }
        }
    }
});</script>
</div>
@endsection








<!-- 
<section class="card">
<div class="d-flex ">
    <h2 >Users</h2>
    <div >
    <form class="navbar-search search-form" action="{{ route('search.users') }}" method="GET">
    <input type="text" name="search" placeholder="Search Users" class="navbar-search-input">
    <i class="fas fa-search search-btn" onclick="submitSearchForm()"></i>
</form>
<script>
    function submitSearchForm() {
        document.querySelector('.search-form').submit(); 
    }
</script>
    </div>
  </div>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Function</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if($user->usertype == '0')
                <a href="{{ url('/deleteuser', $user->id) }}" class="btn btn-delete">Delete</a>
                @else
                <span class="text-muted">Not Allowed</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

  
</section> -->