<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subservice>
 */
class SubserviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $result = [];
        $result['service_id'] = Service::factory();

        foreach (config('translatable.locales') as $locale) {
            $result[$locale] = [
                'name' => $this->faker->name,
                'content' => $this->faker->text,
            ];
        }

        return $result;
    }
}
