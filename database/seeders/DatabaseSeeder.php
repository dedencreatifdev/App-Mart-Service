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
            'email' => 'test@example.com',
        ]);
        $tm->users()->attach($usr->id);

        $usrs = User::factory()->count(5)->create();
        $tm->users()->attach($usrs->pluck('id')->toArray());

        // LEVEL
        $lvl_it = Level::factory()->create([
            'name' => 'IT',
        ]);
        $tm->levels()->attach($lvl_it->id);

        $lvls = Level::factory()->count(4)->create();
        $tm->levels()->attach($lvls->pluck('id')->toArray());

        // PRODUK
        $tm->produks()->attach(Produk::factory()->count(30)->create()->pluck('id')->toArray());

        // PERMISI
        $files = scandir(app_path('Models'));
        $files = array_values(array_filter($files, function ($file) {
            return is_file(app_path('Models/' . $file));
        }));

        $filesWithoutPhp = array_map(function ($file) {
            return preg_replace('/\.php$/', '', $file);
        }, $files);

        foreach ($lvls as $lvl) {
            foreach ($filesWithoutPhp as $file) {
                if ($lvl->name == 'IT') {
                    $akses = 1;
                } else {
                    $akses = 0;
                }
                $perm = Permisi::factory()->create([
                    'name' => $file,
                    'level_id' => $lvl->id,
                    'list' => $akses,
                    'detail' => $akses,
                    'tambah' => $akses,
                    'ubah' => $akses,
                    'hapus' => $akses,
                    'hapus_semua' => $akses,
                ]);
                $tm->permisis()->attach($perm->id);
            }
            //
        }

        foreach ($filesWithoutPhp as $file) {
            if ($lvl->name == 'IT '. $file) {
                $akses = 1;
            } else {
                $akses = 0;
            }
            $perm_it = Permisi::factory()->create([
                'name' => $file,
                'level_id' => $lvl_it->id,
                'list' => true,
                'detail' => true,
                'tambah' => true,
                'ubah' => true,
                'hapus' => true,
                'hapus_semua' => true,
            ]);
            $tm->permisis()->attach($perm_it->id);
        }
    }
}
