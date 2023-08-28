<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\UserModule\app\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city_id' => fake()->numberBetween(1,15),
            'addressable_id' => fake()->numberBetween(1,200),
            'addressable_type' => User::class,
            'district' => fake()->streetName(),
            'street' => fake()->streetAddress(),
            'phone' => fake()->phoneNumber(),
        ];
    }
}
