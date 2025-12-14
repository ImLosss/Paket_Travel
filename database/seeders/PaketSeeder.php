<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paket::create([
            'name' => 'Basic Package',
            'price' => 100.00,
            'description' => 'This is the basic package.',
            'thumbnail' => 'gallery/toraja.webp',
            'category_id' => 1,
            'departure_date' => now()->addDays(10),
            'return_date' => now()->addDays(15),
            'location' => 'Toraja',
            'duration' => 5,
            'rating' => 4,
            'quota' => 20,
        ]);
    }
}
