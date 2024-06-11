<?php

namespace App\Models;

use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamePlayers extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

}
