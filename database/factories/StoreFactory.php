<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arr = [
            '30Shine - Mậu Thân',
            '30Shine - Nguyễn Văn Cừ',
            '30Shine - 3/2',
            '30Shine - 30/4',
            '30Shine - Trần Ngọc Quế',
            '30Shine - Hòa Bình',
            '30Shine - Nguyễn Văn Linh',
            '30Shine - Trần Vĩnh Kiết',
            '30Shine - Cái Răng',
        ];



        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
        ];
    }
}
