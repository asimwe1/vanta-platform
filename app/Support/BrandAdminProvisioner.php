<?php

namespace App\Support;

use App\Models\Brand;
use App\Models\User;
use App\Notifications\BrandAdminAccessNotification;
use Illuminate\Support\Str;

class BrandAdminProvisioner
{
    /**
     * @param  array<string, mixed>  $data
     */
    public static function extractAccessData(array &$data): ?array
    {
        $access = [
            'enabled' => (bool) ($data['create_brand_admin'] ?? false),
            'send_password' => (bool) ($data['send_brand_admin_password'] ?? true),
            'name' => $data['brand_admin_name'] ?? null,
            'email' => $data['brand_admin_email'] ?? null,
        ];

        unset(
            $data['create_brand_admin'],
            $data['send_brand_admin_password'],
            $data['brand_admin_name'],
            $data['brand_admin_email'],
        );

        return $access['enabled'] && filled($access['email']) ? $access : null;
    }

    /**
     * @param  array<string, mixed>|null  $access
     */
    public static function provision(Brand $brand, ?array $access): void
    {
        if (! $access) {
            return;
        }

        $password = Str::password(16);

        $user = User::query()->firstOrNew(['email' => $access['email']]);
        $user->forceFill([
            'brand_id' => $brand->getKey(),
            'name' => $access['name'] ?: $brand->name . ' Admin',
            'password' => $access['send_password'] || ! $user->exists ? $password : $user->password,
            'role' => 'brand_manager',
            'email_verified_at' => $user->email_verified_at ?? now(),
        ])->save();

        if ($access['send_password'] || $user->wasRecentlyCreated) {
            $user->notify(new BrandAdminAccessNotification($brand, $password));
        }
    }
}
