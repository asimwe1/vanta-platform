<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'logo_path',
        'primary_color',
        'accent_color',
        'form_schema',
        'color_config',
        'whatsapp_number',
        'email',
        'website',
        'description',
        'is_active',
        'branding_visible',
        'subscription_status',
        'subscription_tier',
        'vip_capacity',
        'subscription_end_date',
        'card_stock_remaining',
        'data_retention_days',
    ];

    protected function casts(): array
    {
        return [
            'form_schema' => 'array',
            'color_config' => 'array',
            'is_active' => 'boolean',
            'branding_visible' => 'boolean',
            'subscription_end_date' => 'date',
        ];
    }

    public function vipClients(): HasMany
    {
        return $this->hasMany(VipClient::class);
    }

    public function serviceRequests(): HasMany
    {
        return $this->hasMany(ServiceRequest::class);
    }

    public function cardOrders(): HasMany
    {
        return $this->hasMany(CardOrder::class);
    }

    public function isSubscriptionExpired(): bool
    {
        return $this->subscription_end_date !== null && $this->subscription_end_date->isPast();
    }
}
