<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubserviceFactory extends Factory
{
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
