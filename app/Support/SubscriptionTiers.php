<?php

namespace App\Support;

class SubscriptionTiers
{
    /**
     * @return array<string, string>
     */
    public static function options(): array
    {
        return [
            'tier_1' => 'Tier I - Entry Concierge',
            'tier_2' => 'Tier II - Elite Management',
            'tier_3' => 'Tier III - Enterprise',
        ];
    }

    public static function capacityFor(string $tier): ?int
    {
        return match ($tier) {
            'tier_2' => 250,
            'tier_3' => null,
            default => 50,
        };
    }

    public static function retentionDaysFor(string $tier): ?int
    {
        return match ($tier) {
            'tier_2' => 365,
            'tier_3' => null,
            default => 30,
        };
    }

    public static function monthlyGuideFor(string $tier): string
    {
        return match ($tier) {
            'tier_2' => '$300 / month guide',
            'tier_3' => 'Custom quote',
            default => '$100 / month guide',
        };
    }
}
