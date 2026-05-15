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
            'tier_1' => 'Vanta One - Tier I',
            'tier_2' => 'Vanta Luxe - Tier II',
            'tier_3' => 'Vanta Noir - Enterprise',
        ];
    }

    public static function capacityFor(string $tier): ?int
    {
        return match ($tier) {
            'tier_2' => 125,
            'tier_3' => null,
            default => 20,
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
            'tier_2' => '$200 / month guide',
            'tier_3' => 'Custom quote',
            default => '$50 / month guide',
        };
    }
}
