<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{



    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $faker = Faker::create('ru_RU');
        $title = $this->faker->words(3, true);
        return [
            'title' => $title,
            'slug' => Str::slug($title). '-' . rand(1, 1000),
            'description' => $this->faker->sentence(),
            'category_id' => ProductCategory::inRandomOrder()->value('id') ?? ProductCategory::factory(),
        ];
    }
}
