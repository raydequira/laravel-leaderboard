@extends('layout/layout-main')

@section('content')
<h1>Leaderboard</h1>
<h3>Top 10</h3>
    @if(! $leaderBoard)
    <div>No data found!</div>
    @else
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Joined Date</th>
            <th scope="col" class="text-right">Top Score</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($leaderBoard as $player)
        <tr>
            <td>{{ $player->first_name }} {{ $player->last_name }}</td>
            <td>{{ $player->created_at }}</td>
            <td class="text-right">
                {{ number_format($player->average_score, 2, '.', ',') }}
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    @endempty
@endsection