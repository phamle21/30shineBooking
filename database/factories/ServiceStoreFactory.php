<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceStore>
 */
class ServiceStoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            'service_id' => Service::all()->random()->id,
            'store_id' => Store::all()->random()->id,
        ];
    }
}
