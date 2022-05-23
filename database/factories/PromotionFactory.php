<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => strtoupper(Str::random(6)),
            'description' => $this->faker->text(),
            'percent' => $this->faker->numberBetween(0,100),
            'start_at' => '2022-05-19',
            'end_at' => '2022-06-06',
        ];
    }
}
