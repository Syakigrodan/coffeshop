<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fullname' => 'Manager',
            'username' => 'manager',
            'position_id' => 1,
            'password' => Hash::make('password'),
        ]);
        User::create([
            'fullname' => 'Admin',
            'username' => 'admin',
            'position_id' => 2,
            'password' => Hash::make('password'),
        ]);
        User::create([
            'fullname' => 'Cashier',
            'username' => 'cashier',
            'position_id' => 3,
            'password' => Hash::make('password'),
        ]);
    }
}
