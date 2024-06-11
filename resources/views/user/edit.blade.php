@extends('layout/layout-main')

@section('content')
<h1>Edit User</h1>
<div class="text-success">Average Score: {{ number_format($average, 2) }}</div>
<div class="mt-2">
    @include('user/form/user-form', [
        'route' => route('user.update', [
            'id' => $user->id
        ]),  
        'user'  => $user
    ])    
</div>
<h2>Recent Games</h2>
<div class="mt-2">
    @if($user->games_players->isEmpty())
        <div>No data found!</div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Game</th>
                    <th scope="col">Game Date</th>
                    <th scope="col">Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->games_players as $game)
                <tr>
                    <td>{{ $game->game->title }}</td>
                    <td>{{ $game->game->created_at }}</td>
                    <td>{{ $game->score }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>   
    @endif 
</div>
@endsection