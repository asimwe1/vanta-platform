<?php

namespace App\Support;

class CardDesigns
{
    /**
     * @return array<string, string>
     */
    public static function options(): array
    {
        return [
            'matte_black' => 'Matte Black Steel',
            'brushed_gold' => 'Brushed Gold Steel',
            'graphite_steel' => 'Graphite Steel',
            'titanium_steel' => 'Titanium Steel',
            'custom' => 'Custom design request',
        ];
    }

    public static function fixedUnitPrice(string $design): ?int
    {
        return match ($design) {
            'matte_black', 'brushed_gold', 'graphite_steel', 'titanium_steel' => 15,
            default => null,
        };
    }
}
