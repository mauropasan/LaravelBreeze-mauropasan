<?php

namespace Database\Factories;

use App\Models\Ganga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ganga>
 */
class GangaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word,
            'description' => fake()->text,
            'img_url' => "/test.jpg",
            'category_id' => self::factoryForModel('Category')->create()->id,
            'likes' => fake()->randomNumber(),
            'unlikes' => fake()->randomNumber(),
            'price' => fake()->randomFloat(2,10,200),
            'price_sale' => fake()->randomFloat(2,10,200),
            'available' => fake()->boolean,
            'user_id' => self::factoryForModel('User')->create()->id,
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime(),
        ];
    }
}
