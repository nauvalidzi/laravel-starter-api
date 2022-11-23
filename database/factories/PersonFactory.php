<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $boolean = fake()->boolean();
        $firstName = $boolean ? fake()->firstNameMale() : fake()->firstNameFemale();
        $lastName = fake()->lastName();

        return [
            'title' => $boolean ? fake()->titleMale() : fake()->titleFemale(),
            'first_name' => $firstName,
            'last_name' => $lastName,
            'gender' => $boolean ? 'Male' : 'Female',
            'phone' => fake()->e164PhoneNumber(),
            'email' => Str::slug($firstName) . '.' . Str::slug($lastName) . fake()->date('y') . '@'. explode('@', fake()->freeEmail())[1],
            'joined' => fake()->date(),
            'bio' => fake()->realText(200)
        ];
    }
}
