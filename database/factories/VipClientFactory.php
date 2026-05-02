<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VipClientFactory extends Factory
{
    public function definition(): array
    {
        $fullName = fake()->name();

        return [
            'brand_id' => Brand::factory(),
            'full_name' => $fullName,
            'slug' => Str::slug($fullName).'-'.fake()->unique()->numberBetween(1000, 9999),
            'phone' => fake()->optional()->phoneNumber(),
            'email' => fake()->optional()->safeEmail(),
            'membership_code' => strtoupper(fake()->unique()->bothify('VIP-####')),
            'tier' => 'VIP',
            'notes' => fake()->optional()->sentence(),
            'perks' => fake()->optional()->randomElements(['private lounge', 'priority seating', 'host greeting'], fake()->numberBetween(1, 3)),
            'is_active' => true,
        ];
    }
}
