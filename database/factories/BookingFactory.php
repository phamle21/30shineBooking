<?php

namespace Database\Factories;

use App\Models\Promotion;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'stylist_id' => User::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'store_id' => Store::all()->random()->id,
            'promotion_id' => Promotion::all()->random()->id,
            'total' => '200000',
        ];
    }
}
