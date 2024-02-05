<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryProduct::create([
            'category_product_name' => 'Coffee',
            'description' => 'Coffee',
        ]);

        CategoryProduct::create([
            'category_product_name' => 'Non Coffee',
            'description' => 'Non-Coffee',
        ]);

        CategoryProduct::create([
            'category_product_name' => 'Breakfast',
            'description' => 'Breakfast',
        ]);
    }
}
