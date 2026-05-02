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
        'phone',
        'email',
        'membership_code',
        'tier',
        'notes',
        'perks',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'perks' => 'array',
            'is_active' => 'boolean',
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
