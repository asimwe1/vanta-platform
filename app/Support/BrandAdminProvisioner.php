<?php

namespace App\Support;

use App\Models\Brand;
use App\Models\User;
use App\Notifications\BrandAdminAccessNotification;
use Illuminate\Support\Facades\Notification as NotificationFacade;
use Illuminate\Support\Str;

class BrandAdminProvisioner
{
    /**
     * @param  array<string, mixed>  $data
     */
    public static function extractAccessData(array &$data): ?array
    {
        $hasExplicitAdminToggle = array_key_exists('create_brand_admin', $data);

        $access = [
            'enabled' => (bool) ($data['create_brand_admin'] ?? false),
            'send_password' => (bool) ($data['send_brand_admin_password'] ?? true),
            'name' => $data['brand_admin_name'] ?? null,
            'email' => $data['brand_admin_email'] ?? $data['email'] ?? null,
        ];

        unset(
            $data['create_brand_admin'],
            $data['send_brand_admin_password'],
            $data['brand_admin_name'],
            $data['brand_admin_email'],
        );

        if (filled($access['email']) && ! $hasExplicitAdminToggle) {
            $access['enabled'] = true;
        }

        return $access['enabled'] && filled($access['email']) ? $access : null;
    }

    /**
     * @param  array<string, mixed>|null  $access
     * @return array{email: string, created: bool, mailed: bool, mailer: string}|null
     */
    public static function provision(Brand $brand, ?array $access): ?array
    {
        if (! $access) {
            return null;
        }

        $password = Str::password(16, symbols: false);

        $user = User::query()->firstOrNew(['email' => $access['email']]);
        $wasRecentlyCreated = ! $user->exists;

        $user->forceFill([
            'brand_id' => $brand->getKey(),
            'name' => $access['name'] ?: $brand->name . ' Admin',
            'password' => $access['send_password'] || ! $user->exists ? $password : $user->password,
            'role' => 'brand_manager',
            'email_verified_at' => $user->email_verified_at ?? now(),
        ])->save();

        if ($access['send_password'] || $user->wasRecentlyCreated) {
            NotificationFacade::sendNow($user, new BrandAdminAccessNotification($brand, $password));
        }

        return [
            'email' => $user->email,
            'created' => $wasRecentlyCreated,
            'mailed' => $access['send_password'] || $wasRecentlyCreated,
            'mailer' => (string) config('mail.default'),
        ];
    }
}
