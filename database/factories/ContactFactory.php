<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "contact_name" => fake()->name(),
            "contact_phone" => fake()->e164PhoneNumber(),
            'contact_address' => fake()->address(),
            "contact_email" => fake()->unique()->freeEmail(),
            "contact_gender" => fake()->randomElement(['male','female','other']),
            'category_id' => rand(1,6),
            'user_id' => rand(1,8),
        ];
    }
}
