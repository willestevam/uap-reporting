<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Report;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Anonymous Report',
            'email' => 'anonymous@uforeporting.space',
        ]);
        User::factory(10)->create();
        Report::factory()->count(100)->create();

        
    }
}
