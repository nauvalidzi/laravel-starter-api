<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = fake()->creditCardType();

        return [
            'person_id' => rand(1, Person::count()),
            'type' => $type,
            'card_number' => fake()->creditCardNumber($type, true),
            'expiration' => fake()->creditCardExpirationDateString(),
            'swift' => fake()->swiftBicNumber()
        ];
    }
}
