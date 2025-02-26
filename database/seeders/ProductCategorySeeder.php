<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::factory()->count(10)->create()->each(function ($parentCategory) {
            ProductCategory::factory()->count(3)->create(['parent_id' => $parentCategory->id])
                ->each(function ($subCategory) {
                    ProductCategory::factory()->count(2)->create(['parent_id' => $subCategory->id]);
                });
        });
    }

}
