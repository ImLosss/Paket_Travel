<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Facility::create([
            'name' => 'Free Wi-Fi',
            'paket_id' => 1,
        ]);

        Facility::create([
            'name' => 'Breakfast Included',
            'paket_id' => 1,
        ]);
    }
}
