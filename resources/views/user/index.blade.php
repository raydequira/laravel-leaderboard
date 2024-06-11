@extends('layout/layout-main')

@section('content')
<h1>Users</h1>
<a href="{{ route('user.add') }}">Add User</a>
@endsection