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
            'name' => 'Raja Ampat',
            'price' => 5500000,
            'description' => 'Eksplorasi surga bawah laut.',
            'thumbnail' => 'gallery/toraja.webp',
            'category_id' => 1,
            'departure_date' => now()->addDays(10),
            'return_date' => now()->addDays(15),
            'location' => 'Toraja',
            'duration' => 5,
            'rating' => 4,
            'quota' => 20,
        ]);

        Paket::create([
            'name' => 'Borobudur',
            'price' => 3200000,
            'description' => 'Wisata sejarah dan sunrise.',
            'thumbnail' => 'gallery/toraja.webp',
            'category_id' => 1,
            'departure_date' => now()->addDays(10),
            'return_date' => now()->addDays(15),
            'location' => 'Toraja',
            'duration' => 5,
            'rating' => 4,
            'quota' => 20,
        ]);

        Paket::create([
            'name' => 'Paris',
            'price' => 12000000,
            'description' => 'Kota cahaya dan seni.',
            'thumbnail' => 'gallery/toraja.webp',
            'category_id' => 1,
            'departure_date' => now()->addDays(10),
            'return_date' => now()->addDays(15),
            'location' => '',
            'duration' => 5,
            'rating' => 4,
            'quota' => 20,
        ]);

        Paket::create([
            'name' => 'Bali',
            'price' => 2800000,
            'description' => 'Pantai dan budaya.',
            'thumbnail' => 'gallery/toraja.webp',
            'category_id' => 1,
            'departure_date' => now()->addDays(10),
            'return_date' => now()->addDays(15),
            'location' => '',
            'duration' => 5,
            'rating' => 4,
            'quota' => 20,
        ]);
    }
}
