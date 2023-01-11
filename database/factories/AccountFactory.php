<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => 'TEST' . $this->faker->unique()->randomNumber(9),
            'label' => $this->faker->unique()->word,
            'currency' => $this->faker->currencyCode,
            'balance' => $this->faker->randomNumber(3),
        ];
    }
}
