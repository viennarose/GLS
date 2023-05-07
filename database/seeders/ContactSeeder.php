<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => 'Bro. Jose Jekeri P. Taningco',
            'address' => 'Siquijor Masonic Lodge No  418',
            'email' => '418glp@gmail.com',
            'number' => '09282794725'
        ]);
    }
}
