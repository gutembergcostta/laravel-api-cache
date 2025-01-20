<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Module;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'module_id' => Module::factory(),
            'name' => $this->faker->unique()->name(),
            'video' => $this->faker->url(),
            'description' => $this->faker->sentence(20)
        ];
    }
}
