<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']);
        $user = User::create([
            'name' => 'Administrator',
            'email' => 'viennapepito01@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('vienna12345'),
            'admin' => 1,
            'approved_at' => now(),
        ]);
        $user->assignRole($role1);
    }
}
