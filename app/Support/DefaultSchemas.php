<?php

namespace App\Support;

class DefaultSchemas
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public static function for(?string $category): array
    {
        return match ($category) {
            'restaurant' => self::restaurant(),
            'hotel' => self::hotel(),
            'retail' => self::retail(),
            default => self::general(),
        };
    }

    /**
     * @return array<string, string>
     */
    public static function categories(): array
    {
        return [
            'general' => 'General',
            'restaurant' => 'Restaurant',
            'hotel' => 'Hotel',
            'retail' => 'Retail store',
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public static function general(): array
    {
        return [
            self::field('Request name', 'request_name', 'text', true),
            self::field('Preferred date', 'preferred_date', 'date', true),
            self::field('Reference code', 'reference_code', 'text'),
            self::field('Notes', 'notes', 'text'),
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public static function restaurant(): array
    {
        return [
            self::field('Table number', 'table_number', 'text'),
            self::field('Number of guests', 'guest_count', 'number', true),
            self::field('Preferred time', 'preferred_time', 'text', true),
            self::field('Dietary restrictions', 'dietary_restrictions', 'text'),
            self::field('Meal choice', 'meal_choice', 'select', false, ['Chef tasting', 'A la carte', 'Private menu']),
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public static function hotel(): array
    {
        return [
            self::field('Room type', 'room_type', 'select', true, ['Suite', 'Deluxe', 'Presidential']),
            self::field('Check-in date', 'check_in_date', 'date', true),
            self::field('Check-out date', 'check_out_date', 'date', true),
            self::field('Airport pickup', 'airport_pickup', 'select', false, ['Yes', 'No']),
            self::field('Arrival notes', 'arrival_notes', 'text'),
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public static function retail(): array
    {
        return [
            self::field('Item SKU', 'item_sku', 'text', true),
            self::field('Size or color', 'size_color', 'text'),
            self::field('Pickup location', 'pickup_location', 'select', true, ['Boutique', 'Hotel delivery', 'Private courier']),
            self::field('Preferred pickup date', 'pickup_date', 'date'),
        ];
    }

    /**
     * @param  array<int, string>  $options
     * @return array<string, mixed>
     */
    public static function field(string $label, string $variableName, string $type = 'text', bool $isRequired = false, array $options = []): array
    {
        return [
            'label' => $label,
            'variable_name' => $variableName,
            'type' => $type,
            'is_required' => $isRequired,
            'options' => $options,
        ];
    }
}
