<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $company = fake()->company();
        $tld = fake()->tld();

        return [
            'person_id' => rand(1, Person::count()),
            'name' => $company,
            'catch_phrase' => fake()->catchPhrase(),
            'email' => fake()->domainWord() . '@' . Str::slug($company) . '.' . $tld,
            'phone' => fake()->phoneNumber(),
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'country' => fake()->country(),
            'website' => 'https://www.' . Str::slug($company) . '.' . $tld,
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude()
        ];
    }
}
