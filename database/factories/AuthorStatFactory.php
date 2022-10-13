<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuthorStat>
 */
class AuthorStatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'author_id' => 42,
          'likes' => rand(1,100),
          'waves' => rand(1,100),
          'followers' => rand(1,100),
          'sales' => rand(10,100)/10,
        ];
    }
}
