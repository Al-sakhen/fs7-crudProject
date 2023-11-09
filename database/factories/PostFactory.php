<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Post::class;
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(2),
            'body' => fake()->sentence(10),
            'image' => fake()->imageUrl(),
            'status' => fake()->randomElement(['active', 'inactive']),
            'user_id' => fake()->numberBetween(1, 3),
        ];
    }
}
