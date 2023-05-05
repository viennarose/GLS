<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'title' => 'EDICTS',
                ],
            [
                'id' => 2,
                'title' => 'GM CIRCULARS',
                ],
            [
                'id' => 3,
                'title' => 'GS CIRCULARS',
                ],
            [
                'id' => 4,
                'title' => 'FORMS AND TEMPLATES',
                ],
            [
                'id' => 5,
                'title' => 'THE CABLE TOW',
                ],
            [
                'id' => 6,
                'title' => 'MASONIC EDUCATION',
                ],
            [
                'id' => 7,
                'title' => 'ELECTION',
                ],
            [
                'id' => 8,
                'title' => 'BALLOTING',
                ],
            [
                'id' => 9,
                'title' => 'CONFERRAL',
                ],
            [
                'id' => 10,
                'title' => 'IMES',
                ],
            [
                'id' => 11,
                'title' => 'OTHERS',
                ],
            ];

            Resource::insert($data);
    }
}
