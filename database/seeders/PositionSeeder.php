<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create([
            'position_name' => 'Manager',
        ]);
        Position::create([
            'position_name' => 'Admin',
        ]);
        Position::create([
            'position_name' => 'Cashier',
        ]);
    }
}
