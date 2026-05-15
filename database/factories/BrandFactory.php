<?php

namespace Database\Factories;

use App\Support\DefaultSchemas;
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
            'category' => 'general',
            'form_schema' => DefaultSchemas::general(),
            'primary_color' => '#111111',
            'accent_color' => '#BFA46F',
            'color_config' => [
                'primary' => '#BFA46F',
                'accent' => '#111111',
            ],
            'email' => fake()->companyEmail(),
            'website' => fake()->url(),
            'description' => fake()->optional()->sentence(),
            'is_active' => true,
            'subscription_status' => 'active',
            'subscription_tier' => 'tier_1',
            'vip_capacity' => 20,
            'subscription_end_date' => now()->addYear(),
            'card_stock_remaining' => 20,
            'data_retention_days' => 30,
        ];
    }
}
