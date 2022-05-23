<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ImagesService>
 */
class ImagesServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'name' => $this->faker->image('public/storage/images',640,480, 'Service Image'),
            'name' => $this->faker->imageUrl(640,480, 'Service Image'),
            'service_id' => Service::all()->random()->id,
        ];
    }
}
