<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clients>
 */
class ClientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'gender' => $this->faker->name,
            'number' => $this->faker->e164PhoneNumber,
            'address' => $this->faker->address,
            'brand_auto' => $this->faker->name

        ];
    }
}
