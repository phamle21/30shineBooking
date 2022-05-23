<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Promotion;
use App\Models\Service;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookingDetail>
 */
class BookingDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $service_id = Service::all()->random()->id;
        return [
            'service_id' => $service_id,
            'booking_id' => Booking::all()->random()->id,
            'price' => Service::find($service_id)->price,
        ];
    }
}
