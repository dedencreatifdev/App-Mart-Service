<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Permisi;
use App\Models\Produk;
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
        $tm = Team::factory()->create();

        $usr = User::factory()->create([
            // 'id' => '0197110e-9395-736e-8738-f2216b092358',
            // 'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $tm->users()->attach($usr->id);

        //
        $lvl = Level::factory()->create([
            'name' => 'Admin',
        ]);
        $tm->levels()->attach($lvl->id);

        // Membuat beberapa produk dan mengaitkannya dengan tim
        $tm->produks()->attach(Produk::factory()->count(30)->create()->pluck('id')->toArray());

        // Daftar list file dalam folder app/Models
        $files = scandir(app_path('Models'));
        $files = array_values(array_filter($files, function ($file) {
            return is_file(app_path('Models/' . $file));
        }));

        $filesWithoutPhp = array_map(function ($file) {
            return preg_replace('/\.php$/', '', $file);
        }, $files);

        foreach ($filesWithoutPhp as $file) {
            $perm = Permisi::factory()->create([
                'name' => $file,
                'level_id' => $lvl->id,
                'view' => true,
                'tambah' => true,
            ]);
            $tm->permisis()->attach($perm->id);
        }

        // dump('Daftar file tanpa .php:', $filesWithoutPhp);

        // $tm->produks()->attach($produks->id);

        // Filament::getTenant()->usr;

        // User::factory(100)->create();
        // $this->call([
        //     TeamSeeder::class,
        //     ProdukSeeder::class,
        // ]);
    }
}
