<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisitLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'vip_client_id',
        'visited_at',
        'ip_address',
        'user_agent',
        'referrer',
        'metadata',
        'is_unique_visit',
    ];

    protected function casts(): array
    {
        return [
            'visited_at' => 'datetime',
            'metadata' => 'array',
            'is_unique_visit' => 'boolean',
        ];
    }

    public function vipClient(): BelongsTo
    {
        return $this->belongsTo(VipClient::class);
    }
}
