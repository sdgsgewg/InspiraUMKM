<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Design>
 */
class DesignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Randomly select a product
        $productId = Product::inRandomOrder()->first()->id;

        // Randomly select a category that belongs to the chosen product
        $categoryId = Category::where('product_id', $productId)->inRandomOrder()->first()->id;

        return [
            'title' => fake()->sentence(mt_rand(2,8)),
            'slug' => fake()->slug(),
            'description' => collect(fake()->paragraphs(mt_rand(5,10)))->map(fn($p) => "<p>$p</p>")->implode(''),
            'price' => mt_rand(30000, 200000),
            'stock' => mt_rand(1, 20),
            'user_id' => 1,
            'product_id' => $productId,
            'category_id' => $categoryId
        ];
    }
}
