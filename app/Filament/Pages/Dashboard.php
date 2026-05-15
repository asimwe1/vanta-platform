<?php

namespace App\Filament\Pages;

use App\Filament\Resources\Brands\BrandResource;
use App\Filament\Resources\CardOrders\CardOrderResource;
use App\Filament\Resources\ServiceRequests\ServiceRequestResource;
use App\Filament\Resources\VipClients\VipClientResource;
use App\Models\Brand;
use App\Models\ServiceRequest;
use App\Models\VipClient;
use App\Support\SubscriptionTiers;
use Filament\Actions\Action;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Support\Icons\Heroicon;

class Dashboard extends BaseDashboard
{
    protected string $view = 'filament.pages.dashboard';

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static ?string $navigationLabel = 'Command Center';

    protected static ?int $navigationSort = -10;

    public function getTitle(): string
    {
        return 'Vanta Command Center';
    }

    public function getWidgets(): array
    {
        return [];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('newVipClient')
                ->label('Add VIP client')
                ->url(VipClientResource::getUrl('create'))
                ->icon(Heroicon::Plus),
            Action::make('orderCards')
                ->label('Order cards')
                ->url(CardOrderResource::getUrl('create'))
                ->icon(Heroicon::OutlinedCreditCard),
            Action::make('newBrand')
                ->label('Add brand')
                ->url(BrandResource::getUrl('create'))
                ->icon(Heroicon::BuildingStorefront),
        ];
    }

    protected function getViewData(): array
    {
        $user = auth()->user();
        $brandId = $user && ! $user->isSuperAdmin() ? $user->brand_id : null;
        $currentBrand = $brandId ? Brand::query()->find($brandId) : null;

        $vipClients = VipClient::query();
        $brands = Brand::query();
        $serviceRequests = ServiceRequest::query();

        if ($brandId) {
            $vipClients->where('brand_id', $brandId);
            $brands->whereKey($brandId);
            $serviceRequests->where('brand_id', $brandId);
        }

        $recentVipClients = VipClient::query()
            ->with('brand')
            ->when($brandId, fn ($query) => $query->where('brand_id', $brandId))
            ->latest()
            ->limit(4)
            ->get();

        $latestServiceRequests = ServiceRequest::query()
            ->with(['vipClient', 'brand'])
            ->when($brandId, fn ($query) => $query->where('brand_id', $brandId))
            ->latest()
            ->limit(4)
            ->get();

        return [
            'lensLabel' => $brandId ? ($user->brand?->name . ' lens') : 'System-wide lens',
            'currentBrand' => $currentBrand,
            'tierLabel' => $currentBrand ? (SubscriptionTiers::options()[$currentBrand->subscription_tier ?: 'tier_1'] ?? 'Vanta One - Tier I') : 'Super Admin',
            'cardOrderCreateUrl' => CardOrderResource::getUrl('create'),
            'cardOrderIndexUrl' => CardOrderResource::getUrl('index'),
            'showAdvancedInsights' => ! $currentBrand || in_array($currentBrand->subscription_tier, ['tier_2', 'tier_3'], true),
            'metrics' => [
                [
                    'label' => 'Active VIP clients',
                    'value' => (clone $vipClients)->where('is_active', true)->count(),
                    'detail' => (clone $vipClients)->count() . ' total profiles',
                ],
                [
                    'label' => 'Live brands',
                    'value' => (clone $brands)->where('is_active', true)->count(),
                    'detail' => (clone $brands)->count() . ' configured brands',
                ],
                [
                    'label' => 'Service requests',
                    'value' => (clone $serviceRequests)->count(),
                    'detail' => (clone $serviceRequests)->where('created_at', '>=', now()->subDays(7))->count() . ' in the last 7 days',
                ],
            ],
            'billingMetrics' => $currentBrand ? [
                [
                    'label' => 'Retainer tier',
                    'value' => SubscriptionTiers::options()[$currentBrand->subscription_tier ?: 'tier_1'] ?? 'Vanta One - Tier I',
                    'detail' => $currentBrand->subscription_status ?: 'active',
                ],
                [
                    'label' => 'VIP capacity',
                    'value' => (clone $vipClients)->count() . ' / ' . number_format($currentBrand->vip_capacity),
                    'detail' => 'Capacity-based retainer guard',
                ],
                [
                    'label' => 'Card stock',
                    'value' => number_format($currentBrand->card_stock_remaining),
                    'detail' => $currentBrand->card_stock_remaining < 5 ? 'Low stock: reorder recommended' : 'Stock level healthy',
                ],
            ] : [],
            'recentVipClients' => $recentVipClients,
            'latestServiceRequests' => $latestServiceRequests,
            'brandIndexUrl' => BrandResource::getUrl('index'),
            'serviceRequestIndexUrl' => ServiceRequestResource::getUrl('index'),
            'vipIndexUrl' => VipClientResource::getUrl('index'),
            'vipCreateUrl' => VipClientResource::getUrl('create'),
        ];
    }
}
