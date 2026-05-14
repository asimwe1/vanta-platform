<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'vip_client_id',
        'type',
        'data_payload',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'data_payload' => 'array',
        ];
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function vipClient(): BelongsTo
    {
        return $this->belongsTo(VipClient::class);
    }
}
