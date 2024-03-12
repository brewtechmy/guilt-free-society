<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id'    => 1,
                'name' => 'Pre-set Bowl',
            ],
            [
                'id'    => 2,
                'title' => 'Juice',
            ],
        ];

        ProductCategory::insert($categories);
    }
}
