<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $result = [];

        foreach (config('translatable.locales') as $locale) {
            $result[$locale] = [
                'title' => $this->faker->title,
                'content' => $this->faker->text,
            ];
        }

        return $result;
    }
}
