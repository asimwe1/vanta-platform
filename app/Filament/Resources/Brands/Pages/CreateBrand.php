<?php

namespace App\Filament\Resources\Brands\Pages;

use App\Filament\Resources\Brands\BrandResource;
use App\Support\DefaultSchemas;
use App\Support\SubscriptionTiers;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateBrand extends CreateRecord
{
    protected static string $resource = BrandResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Create brand house';
    }

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->label('Create brand house');
    }

    protected function getCreateAnotherFormAction(): Action
    {
        return parent::getCreateAnotherFormAction()
            ->label('Create and add another');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (blank($data['form_schema'] ?? null)) {
            $data['form_schema'] = DefaultSchemas::for($data['category'] ?? 'general');
        }

        $data['color_config'] ??= [
            'primary' => $data['primary_color'] ?? '#BFA46F',
            'accent' => $data['accent_color'] ?? '#111111',
        ];

        $data['subscription_tier'] ??= 'tier_1';
        $data['vip_capacity'] ??= SubscriptionTiers::capacityFor($data['subscription_tier']) ?? 999999;
        $data['data_retention_days'] ??= SubscriptionTiers::retentionDaysFor($data['subscription_tier']) ?? 3650;

        return $data;
    }
}
