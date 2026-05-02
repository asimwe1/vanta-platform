<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->company();

        return [
            'name' => $name,
            'slug' => Str::slug($name).'-'.fake()->unique()->numberBetween(100, 999),
            'primary_color' => '#111111',
            'accent_color' => '#BFA46F',
            'email' => fake()->companyEmail(),
            'website' => fake()->url(),
            'description' => fake()->optional()->sentence(),
            'is_active' => true,
        ];
    }
}
