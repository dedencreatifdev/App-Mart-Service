<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Team;
use App\Models\User;
use Filament\Facades\Filament;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $usr = User::factory()->create([
            // 'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $lvl = Level::factory()->create([
            'name' => 'Admin',
        ]);

        $tm = Team::factory()->create([
            // 'name' => 'Team ' . $usr->name,
        ]);

        $tm->users()->attach($usr->id);
        $tm->levels()->attach($lvl->id);

        // Filament::getTenant()->usr;

        User::factory(100)->create();
        // $this->call([
        //     TeamSeeder::class,
        //     ProdukSeeder::class,
        // ]);
    }
}
