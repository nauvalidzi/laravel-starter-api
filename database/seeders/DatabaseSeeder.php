<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Blog;
use App\Models\Company;
use App\Models\Payment;
use App\Models\Person;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Person::factory(50)->create();
        Address::factory(50)->create();
        Company::factory(50)->create();
        Blog::factory(50)->create();
        Payment::factory(50)->create();
    }
}
