<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
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
