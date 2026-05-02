<?php

namespace Database\Factories;

use App\Models\VipClient;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitLogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'vip_client_id' => VipClient::factory(),
            'user_agent' => fake()->optional()->userAgent(),
            'ip_address' => fake()->optional()->ipv4(),
            'visited_at' => fake()->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
