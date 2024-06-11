<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;    
    
    public function gamePlayer()
    {
        return $this->hasMany(GamePlayers::class);
    }
}
