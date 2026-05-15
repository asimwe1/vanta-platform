<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'brand_id',
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isSuperAdmin()
            || ($this->isBrandManager() && $this->brand_id !== null);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === 'super_admin' && $this->brand_id === null;
    }

    public function isBrandManager(): bool
    {
        return $this->role === 'brand_manager';
    }

    public function hasExpiredBrandSubscription(): bool
    {
        return ! $this->isSuperAdmin()
            && $this->brand !== null
            && $this->brand->isSubscriptionExpired();
    }
}
