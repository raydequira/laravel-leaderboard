<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GamePlayers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index() 
    {
        $topScores = DB::table('game_players')
            ->select(
                'game_players.user_id',
                DB::raw('AVG(score) as average_score')
            )->leftJoin('users','users.id','=','game_players.user_id')
            ->groupBy('game_players.user_id')
            ->orderBy('average_score', 'DESC')
            ->limit(10);

        $leaderBoard = DB::table('users')
            ->select(
                'first_name',
                'last_name',
                'created_at',
                'average.average_score'
            )->joinSub($topScores, 'average', function ($join) {
                $join->on('average.user_id', '=', 'users.id');
            })->orderBy('average.average_score', 'DESC')
            ->get();       

        return view('leaderboard/index',[
            'leaderBoard' => $leaderBoard
        ]);
    }
}
