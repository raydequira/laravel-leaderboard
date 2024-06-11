<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\GamePlayers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::factory(10)
            ->has(GamePlayers::factory(rand(2, 4)))
            ->create();
    }
}
