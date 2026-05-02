<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VipClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'full_name',
        'slug',
        'membership_code',
        'email',
        'phone',
        'notes',
        'profile_data',
        'is_active',
        'shared_at',
    ];

    protected function casts(): array
    {
        return [
            'profile_data' => 'array',
            'is_active' => 'boolean',
            'shared_at' => 'datetime',
        ];
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function visitLogs(): HasMany
    {
        return $this->hasMany(VisitLog::class);
    }
}
