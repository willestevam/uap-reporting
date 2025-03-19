<?php

namespace Database\Seeders;

use App\Models\Report;
#use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Report::factory()->count(100)->create();
    }
}
