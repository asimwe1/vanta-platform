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
        'user_agent',
        'ip_address',
        'visited_at',
    ];

    protected function casts(): array
    {
        return [
            'visited_at' => 'datetime',
        ];
    }

    public function vipClient(): BelongsTo
    {
        return $this->belongsTo(VipClient::class);
    }
}
