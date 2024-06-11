@extends('layout/layout-main')

@section('content')
<h1>Edit User</h1>
<a href="{{ route('users') }}">View List</a>
<div class="mt-2">
    @include('user/form/user-form', [
        'route' => route('user.update', [
            'id' => $user->id
        ]),  
        'user'  => $user
    ])
</div>
@endsection