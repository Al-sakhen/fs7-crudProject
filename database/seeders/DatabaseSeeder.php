<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\Region;
use App\Models\Store;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Post::factory()->count(30)->create();
        Region::factory()->count(30)->create();
        Store::factory()->count(30)->create();
        // $this->call([
        //     UserSeeder::class,
        // ]);
    }
}
