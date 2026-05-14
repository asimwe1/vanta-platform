<?php

namespace App\Filament\Pages;

use App\Filament\Resources\Brands\BrandResource;
use App\Filament\Resources\CardOrders\CardOrderResource;
use App\Models\Brand;
use App\Support\SubscriptionTiers;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class Billing extends Page
{
    protected string $view = 'filament.pages.billing';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static ?string $navigationLabel = 'Billing';

    protected static string|UnitEnum|null $navigationGroup = 'Billing';

    protected static ?int $navigationSort = 1;

    public function getTitle(): string
    {
        return 'Billing and SLA';
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->isSuperAdmin() ?? false;
    }

    protected function getViewData(): array
    {
        $brands = Brand::query()
            ->withCount(['vipClients', 'cardOrders'])
            ->orderByRaw('subscription_end_date is null')
            ->orderBy('subscription_end_date')
            ->get();

        return [
            'brands' => $brands,
            'expiringBrands' => $brands
                ->filter(fn (Brand $brand): bool => $brand->subscription_end_date !== null
                    && $brand->subscription_end_date->between(now()->startOfDay(), now()->addDays(14))),
            'lowStockBrands' => $brands->filter(fn (Brand $brand): bool => $brand->card_stock_remaining < 5),
            'tierOptions' => SubscriptionTiers::options(),
            'brandIndexUrl' => BrandResource::getUrl('index'),
            'cardOrderIndexUrl' => CardOrderResource::getUrl('index'),
        ];
    }
}
