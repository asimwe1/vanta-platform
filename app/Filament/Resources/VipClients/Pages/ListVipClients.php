<?php

namespace App\Filament\Resources\VipClients\Pages;

use App\Filament\Resources\VipClients\VipClientResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

class ListVipClients extends ListRecords
{
    protected static string $resource = VipClientResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'VIP profiles';
    }

    protected function getHeaderActions(): array
    {
        $user = auth()->user();
        $brand = $user && ! $user->isSuperAdmin() ? $user->brand : null;
        $capacityReached = $brand
            && filled($brand->vip_capacity)
            && $brand->vipClients()->count() >= $brand->vip_capacity;
        $waitlistVisible = $brand
            && $brand->subscription_tier === 'tier_1'
            && $brand->vipClients()->count() >= 15
            && ! $capacityReached;

        return [
            Action::make('waitlist')
                ->label('Waitlist mode: ' . ($brand?->vipClients()->count() ?? 0) . ' / ' . ($brand?->vip_capacity ?? 20))
                ->color('warning')
                ->icon(Heroicon::OutlinedExclamationTriangle)
                ->disabled()
                ->visible($waitlistVisible),
            CreateAction::make()
                ->label('New VIP profile')
                ->icon(Heroicon::Plus)
                ->disabled($capacityReached)
                ->tooltip($capacityReached ? 'Capacity reached. Contact APHEZIS to upgrade this retainer tier.' : null),
        ];
    }
}
