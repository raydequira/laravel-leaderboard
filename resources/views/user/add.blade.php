@extends('layout/layout-main')

@section('content')
<h1>Add User</h1>
<a href="{{ route('users') }}">View List</a>
<div class="mt-2">
    @include('user/form/user-form', [
        'route' => route('user.store'),
        'user'  => null
    ])
</div>
@endsection