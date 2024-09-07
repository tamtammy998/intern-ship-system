<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'student_id' => '00000',
            'first_name' => 'Hecel',
            'email' => 'kavibes11@gmail.com',
             'usertype' => 'admin',
            'password' => bcrypt('password'),
        ]);
    }
}
