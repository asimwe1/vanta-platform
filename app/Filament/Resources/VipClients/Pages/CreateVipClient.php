<?php

namespace App\Filament\Resources\VipClients\Pages;

use App\Filament\Resources\VipClients\VipClientResource;
use App\Models\Brand;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Validation\ValidationException;

class CreateVipClient extends CreateRecord
{
    protected static string $resource = VipClientResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Create VIP profile';
    }

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->label('Create VIP profile');
    }

    protected function getCreateAnotherFormAction(): Action
    {
        return parent::getCreateAnotherFormAction()
            ->label('Create and add another');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth()->user();

        if ($user && ! $user->isSuperAdmin()) {
            $data['brand_id'] = $user->brand_id;
        }

        $brand = Brand::query()->find($data['brand_id'] ?? null);

        if (
            $brand
            && filled($brand->vip_capacity)
            && $brand->vipClients()->count() >= $brand->vip_capacity
        ) {
            throw ValidationException::withMessages([
                'data.brand_id' => 'VIP capacity reached. Contact APHEZIS to upgrade this retainer tier.',
            ]);
        }

        return $data;
    }
}
