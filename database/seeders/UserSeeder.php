<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'haneen',
            'email' => 'haneen@admin.com',
            'password' => Hash::make('123456789'),
        ]);

        User::create([
            'name' => 'rama',
            'email' => 'rama@admin.com',
            'password' => Hash::make('123456789'),
        ]);
        
        User::create([
            'name' => 'raghida',
            'email' => 'raghida@admin.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
