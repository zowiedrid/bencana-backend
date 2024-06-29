<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Todo;
use App\Models\User;
use App\Models\Posko;
use App\Models\Barang;
use App\Models\Daerah;
use App\Models\Bencana;
use App\Models\Category;
use App\Models\Kebutuhan;
use App\Models\Distribusi;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'is_admin' => true
            ]
        );
        User::create(
            [
                'name' => 'Ilham Fadhilah',
                'email' => 'wtwdawe3@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'is_admin' => false
            ]
        );
        User::factory(100)->create();
        Category::factory(200)->create();
        Todo::factory(500)->create();
        Barang::factory(10)->create();
        Bencana::factory(10)->create();
        Daerah::factory(10)->create();
        Distribusi::factory(10)->create();
        Kebutuhan::factory(10)->create();
        Posko::factory(10)->create();
    }
}
