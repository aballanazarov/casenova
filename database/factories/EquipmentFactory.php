<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentFactory extends Factory
{
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
