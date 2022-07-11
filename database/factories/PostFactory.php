<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'userId' => $this->faker->numberBetween(1,20),
            'title' => $this->faker->unique()->name(),
            'body' => $this->faker->text(),
        ];
    }
}
