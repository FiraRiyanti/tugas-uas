<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'nama' => 'Fira Riyanti',
        ]);
    }
}
