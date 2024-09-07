<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::firstOrCreate([
            'abbreviation' => 'BSCS',
            'name' => 'Bachelor of Science in Computer Science',
            'description' => 'description',
        ]);
    }
}
