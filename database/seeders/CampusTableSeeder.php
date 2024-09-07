<?php

namespace Database\Seeders;

use App\Models\Campuses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campuses::firstOrCreate([
            'name' => 'Bohol Island State University - Bilar Campus',
            'location' => 'Zamora, Bilar, Bohol',
            'president' => 'OIC',
            'description' => 'description',
        ]);
    }
}
