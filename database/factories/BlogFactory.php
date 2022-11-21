<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence(fake()->numberBetween(4,6));

        return [
            'person_id' => rand(1, Person::count()),
            'slug' => Str::slug($title),
            'title' => $title,
            'contents' => fake()->paragraphs(10, true),
            'posted' => fake()->boolean()
        ];
    }
}
