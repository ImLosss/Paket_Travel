<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => 'password'
        ])->assignRole('admin');

        User::create([
            'username' => 'irian',
            'password' => 'password'
        ])->assignRole('user');
    }
}
