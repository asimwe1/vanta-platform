<?php

namespace App\Models;

use App\Support\CardDesigns;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CardOrder extends Model
{
    protected $fillable = [
        'brand_id',
        'quantity',
        'design_type',
        'status',
        'unit_price',
        'quoted_total',
        'custom_artwork_path',
        'notes',
        'approved_at',
        'fulfilled_at',
    ];

    protected function casts(): array
    {
        return [
            'approved_at' => 'datetime',
            'fulfilled_at' => 'datetime',
        ];
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    protected static function booted(): void
    {
        static::saving(function (CardOrder $order): void {
            $unitPrice = CardDesigns::fixedUnitPrice($order->design_type);

            if ($unitPrice !== null) {
                $order->unit_price = $unitPrice;
                $order->quoted_total = $order->quantity * $unitPrice;
            }

            if ($order->isDirty('status') && $order->status === 'approved' && blank($order->approved_at)) {
                $order->approved_at = now();
            }

            if ($order->isDirty('status') && $order->status === 'fulfilled' && blank($order->fulfilled_at)) {
                $order->fulfilled_at = now();
            }
        });

        static::updated(function (CardOrder $order): void {
            if ($order->wasChanged('status') && $order->status === 'fulfilled' && $order->getOriginal('status') !== 'fulfilled') {
                $order->brand?->increment('card_stock_remaining', $order->quantity);
            }
        });
    }
}
