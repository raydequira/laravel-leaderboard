@extends('layout/layout-main')

@section('content')
<h1>Users</h1>
<a href="{{ route('user.add') }}">Add User</a>
    @if($users->isEmpty())
        <div>No data found!</div>
    @else
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('user.edit', ['id' => $user->id])}}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endempty
@endsection