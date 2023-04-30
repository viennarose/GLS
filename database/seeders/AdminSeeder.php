<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'kennbassist@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('kenn12345'),
            'admin' => 1,
            'approved_at' => now(),
        ]);
    }
}
