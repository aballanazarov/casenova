<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
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
                'name' => $this->faker->name,
                'title' => $this->faker->title,
            ];
        }

        return $result;
    }
}
